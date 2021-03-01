//JSLint Verified : Please do not commit this file without first validating it in JSLint. 
/*jslint browser: true, nomen: true, sloppy: true, white: true, newcap: true, regexp: true, bitwise : true, plusplus: true */
/*global $, console, alert, jQuery, confirm */

var Pagination = function (el, options) {
	options.labels = options.labels || {};

	var $container = $(el),
		$pagesContainer,
		$pageRangeCombo,

		ALL = -1,
		PREVIOUS_PAGE_NUMBER = -1,
		NEXT_PAGE_NUMBER = -2,
		FIRST_PAGE_NUMBER = -3,
		LAST_PAGE_NUMBER = -4,

		isDisabled = options.isDisabled || false,
		itemsCount = options.itemsCount,
		currentPage = options.currentPage || 1,
		pageRange = options.pageRange || [10, 20, 30, -1], //-1 (All)
		pageSize = options.pageSize || pageRange[0],

		allPagesLabel = options.labels.all || 'All',
		firstPageLabel = options.labels.first || '<i class="ki ki-bold-double-arrow-back icon-xs"></i>',
		lastPageLabel = options.labels.last || '<i class="ki ki-bold-double-arrow-next icon-xs"></i>',
		nextPageLabel = options.labels.next || '<i class="ki ki-bold-arrow-next icon-xs"></i>',
		previousPageLabel = options.labels.previous || '<i class="ki ki-bold-arrow-back icon-xs"></i>',

		init, changePageSize, reRenderPageNumbers, getRenderedPageNumbers, getPageNumbersToDisplay,
		getPagesCount, goNextPage, goPreviousPage, goToPage, disable, enable, getRenderedPager,
		process, getRenderedPageRange, toggleElements, onPageClick, onPageRangeComboChange, goToFirstPage, goToLastPage;

	init = function () {
		$container.html(getRenderedPager());
		$pagesContainer = $container.find('.pagination');
		$pageRangeCombo = $container.find('.page-range');

		toggleElements();

		$pagesContainer.on("click", "a.btn-icon", onPageClick);
		$pageRangeCombo.on('change', onPageRangeComboChange);

		process();
		$('.page-range').selectpicker();
		$('div.page-range').css({'width': '75px', 'border-radius': '5px'});
	};

	onPageRangeComboChange = function () {
		var psValue = Number($(this).val()),
			ps = psValue === ALL ? itemsCount : psValue;

		if (!isDisabled) {
			if (typeof options.onPageSizeChange === 'function') {
				options.onPageSizeChange(ps);
			}

			changePageSize(ps);
			toggleElements();
		}
	};

	onPageClick = function () {
		var $p = $(this),
			page = $p.data('page');

		if (!isDisabled && !$p.hasClass('active')) {
			switch (page) {
				case PREVIOUS_PAGE_NUMBER:
					goPreviousPage();
					break;
				case NEXT_PAGE_NUMBER:
					goNextPage();
					break;
				case FIRST_PAGE_NUMBER:
					goToFirstPage();
					break;
				case LAST_PAGE_NUMBER:
					goToLastPage();
					break;
				default:
					goToPage(page);
					break;
			}

			toggleElements();
		}
	};

	toggleElements = function () {
		var pageCount = getPagesCount();

		$pagesContainer.find('a[data-page="' + PREVIOUS_PAGE_NUMBER + '"]').toggleClass('disabled', currentPage === 1);
		$pagesContainer.find('a[data-page="' + NEXT_PAGE_NUMBER + '"]').toggleClass('disabled', currentPage === pageCount);
		$pagesContainer.find('a[data-page="' + FIRST_PAGE_NUMBER + '"]').toggleClass('disabled', currentPage === 1);
		$pagesContainer.find('a[data-page="' + LAST_PAGE_NUMBER + '"]').toggleClass('disabled', currentPage === pageCount);
	};

	changePageSize = function (ps) {
		pageSize = ps;
		goToPage(1);
	};

	reRenderPageNumbers = function () {
		$pagesContainer.html(getRenderedPageNumbers());
	};

	getRenderedPager = function () {
		return '<div class="pagination d-flex flex-wrap mr-3">' + getRenderedPageNumbers() + '</div>' + getRenderedPageRange();
	};

	getRenderedPageRange = function () {
		var result = '<div class="d-flex justify-content-between align-items-center flex-wrap">\
			<select class="page-range text-primary font-weight-bold border-0 bg-light-primary mr-3" data-style="form-control-solid form-control-lg text-dark">';

		$.each(pageRange, function (i, p) {
			var selected = pageSize === p ? 'selected="selected"' : '';
			result += '<option ' + selected + ' value="' + p + '">' + (p === ALL ? allPagesLabel : p) + '</option>';
		});

		return result += '</select><span class="text-muted">Displaying <span class="cantidad"></span> of <span class="total"> '+itemsCount+' </span> records</span></div>';
	};

	getRenderedPageNumbers = function () {
		var pageNumbers = getPageNumbersToDisplay(),
			result;

		result = '<a data-page="' + FIRST_PAGE_NUMBER + '" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" href="javascipt:void(0)">' + firstPageLabel + '</a>' +
				 '<a data-page="' + PREVIOUS_PAGE_NUMBER + '" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 href="javascipt:void(0)">' + previousPageLabel + '</a>';

		$.each(pageNumbers, function (i, p) {
			result += '<a data-page="' + p + '" class="btn btn-icon btn-sm border-0 btn-hover-primary ' + (p === currentPage ? 'active ' : '') + 'mr-2 my-1" href="javascipt:void(0)">' + p + '</a>';
		});

		result += '<a data-page="' + NEXT_PAGE_NUMBER + '" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 href="javascipt:void(0)">' + nextPageLabel + '</a>' +
				  '<a data-page="' + LAST_PAGE_NUMBER + '" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 href="javascipt:void(0)">' + lastPageLabel + '</a>';

		return result;
	};

	getPageNumbersToDisplay = function () {
		var pageNumbers = [],
			startFromNumber,
			pagesToShow = 5,
			i = 1,
			pageCount = getPagesCount();

		if (pageCount < 5) {
			pagesToShow = pageCount;
		}

		if (currentPage === 1 || currentPage === 2) {
			startFromNumber = 1;
		}
		else if (currentPage === pageCount) {
			startFromNumber = currentPage - (pagesToShow - 1);
		}
		else if ((pageCount - currentPage) === 1 && pageCount >= 5) {
			startFromNumber = currentPage - 3;
		}
		else {
			startFromNumber = currentPage - 2;
		}

		while (i <= pagesToShow) {
			pageNumbers.push(startFromNumber++);
			i++;
		}

		return pageNumbers;
	};

	getPagesCount = function () {
		return Math.ceil(itemsCount / pageSize);
	};

	goNextPage = function () {
		if (currentPage < getPagesCount()) {
			currentPage++;
			reRenderPageNumbers();

			process();
		}
	};

	goPreviousPage = function () {
		if (currentPage > 1) {
			currentPage--;
			reRenderPageNumbers();
			process();
		}
	};

	goToFirstPage = function() {
		if (currentPage !== 1) {
			goToPage(1);
		}
	};

	goToLastPage = function () {
		var pageCount = getPagesCount();

		if (currentPage !== pageCount) {
			goToPage(pageCount);
		}
	};

	goToPage = function (pageNumber) {
		currentPage = pageNumber;
		reRenderPageNumbers();
		process();
	};

	disable = function () {
		isDisabled = true;
		$pagesContainer.addClass('disabled');
		$pageRangeCombo.prop('disabled', true);
	};

	enable = function () {
		isDisabled = false;
		$pagesContainer.removeClass('disabled');
		$pageRangeCombo.prop('disabled', false);
	};

	process = function () {
		if (typeof options.onPageChange === 'function') {
			options.onPageChange({
				currentPage: currentPage,
				pageSize: pageSize
			});
		}
	};

	init();

	this.disable = disable;
	this.enable = enable;
};