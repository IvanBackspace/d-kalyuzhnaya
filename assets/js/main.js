(() => {
    const burger = document.getElementById('burger');
    const menu = document.getElementById('header__bottom-info');
    burger.addEventListener('click', () => {
        menu.classList.toggle('active');
        burger.classList.toggle('active');
    });


    function setWidthScrollBar() {
        let div = document.createElement('div');

        div.style.position = 'absolute';
        div.style.overflowY = 'scroll';
        div.style.width = '50px';
        div.style.height = '50px';

        document.body.append(div);
        let scrollWidth = div.offsetWidth - div.clientWidth;

        div.remove();

        return scrollWidth;
    }

    document.querySelectorAll('.menu__item--submenu').forEach(item => {
        const openBtn = item.querySelector('.menu__toggle');
        const closeBtn = item.querySelector('.submenu__toggle');
        const submenu = item.querySelector('.submenu');
        console.log(submenu);

        openBtn.addEventListener('click', () => {
            submenu.classList.add('active');
        });

        closeBtn.addEventListener('click', () => {
            submenu.classList.remove('active');
        });
    });

    function bodyLock(bool) {
        if (bool) {
            document.body.classList.add('lock');
        } else {
            document.body.classList.remove('lock');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const doctorsSwiper = new Swiper(".doctorsSwiper", {
            slidesPerView: 1.1,
            spaceBetween: 10,
            navigation: {
                nextEl: ".doctors-staff__swiper-button-next",
                prevEl: ".doctors-staff__swiper-button-prev"
            },
            pagination: {
                el: '.doctors-staff__swiper-pagination',
                type: 'custom',
                renderCustom: function (swiper, current, total) {
                    const currentFormatted = String(current).padStart(2, '0');
                    const totalFormatted = String(total).padStart(2, '0');
                    return `<span class="pagination-current">${currentFormatted}</span> / <span class="pagination-total">${totalFormatted}</span>`;
                }
            },
            grabCursor: true,
            breakpoints: {
                1380: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                830: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                550: {
                    slidesPerView: 1.2,
                    spaceBetween: 10
                }
            }
        });
        const expertAssistanceSwiper = new Swiper(".expertAssistanceSwiper", {
            slidesPerView: 1.1,
            spaceBetween: 10,
            navigation: {
                nextEl: ".expert-assistance__swiper-button-next",
                prevEl: ".expert-assistance__swiper-button-prev"
            },
            pagination: {
                el: '.expert-assistance__swiper-pagination',
                type: 'custom',
                renderCustom: function (swiper, current, total) {
                    const currentFormatted = String(current).padStart(2, '0');
                    const totalFormatted = String(total).padStart(2, '0');
                    return `<span class="pagination-current">${currentFormatted}</span> / <span class="pagination-total">${totalFormatted}</span>`;
                }
            },
            grabCursor: true,
            breakpoints: {
                1380: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                830: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                550: {
                    slidesPerView: 1.2,
                    spaceBetween: 10
                }
            }
        });
        const pathCirculationSwiper = new Swiper(".pathCirculationSwiper", {
            slidesPerView: 1.1,
            spaceBetween: 10,
            navigation: {
                nextEl: ".path-circulation__swiper-button-next",
                prevEl: ".path-circulation__swiper-button-prev"
            },
            pagination: {
                el: '.path-circulation__swiper-pagination',
                type: 'custom',
                renderCustom: function (swiper, current, total) {
                    const currentFormatted = String(current).padStart(2, '0');
                    const totalFormatted = String(total).padStart(2, '0');
                    return `<span class="pagination-current">${currentFormatted}</span> / <span class="pagination-total">${totalFormatted}</span>`;
                }
            },
            grabCursor: true,
            breakpoints: {
                1380: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                830: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                550: {
                    slidesPerView: 1.2,
                    spaceBetween: 10
                }
            }
        });
        const strengthReturningSwiper = new Swiper(".strengthReturningSwiper", {
            slidesPerView: 1.1,
            spaceBetween: 10,
            navigation: {
                nextEl: ".strength-returning__swiper-button-next",
                prevEl: ".strength-returning__swiper-button-prev"
            },
            pagination: {
                el: '.strength-returning__swiper-pagination',
                type: 'custom',
                renderCustom: function (swiper, current, total) {
                    const currentFormatted = String(current).padStart(2, '0');
                    const totalFormatted = String(total).padStart(2, '0');
                    return `<span class="pagination-current">${currentFormatted}</span> / <span class="pagination-total">${totalFormatted}</span>`;
                }
            },
            grabCursor: true,
            breakpoints: {
                1380: {
                    slidesPerView: 4,
                    spaceBetween: 20
                },
                830: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                550: {
                    slidesPerView: 1.2,
                    spaceBetween: 10
                }
            }
        });
    });

    // function initModalWorker() {
    //     const modalList = document.querySelectorAll('.modal');
    //     const modalWindow = document.querySelector('#modal-window');
    //     const modalButtons = document.querySelectorAll('.modal-button');
    //     const modalWindowCity = document.querySelector('#modal-window-city');
    //     const modalButtonsCity = document.querySelectorAll('.modal-button-city');
    //     const modalClosers = document.querySelectorAll('.modal-close');

    //     modalClosers.forEach((closer) => {
    //         closer.addEventListener('click', () => {
    //             const responseBlockList = document.querySelectorAll('.response-block');
    //             bodyLock(false);
    //             document.querySelector('html').style.paddingRight = 0;
    //             modalList.forEach(function (modal) {
    //                 modal.classList.remove('active');
    //             });
    //             responseBlockList.forEach(function (responseBlock) {
    //                 responseBlock.remove();
    //             });
    //             modalWindow.querySelectorAll('.form').forEach((form) => {
    //                 form.reset();
    //             });
    //         });
    //     });

    //     modalButtons.forEach((button) => {
    //         button.addEventListener('click', () => {
    //             const target = button.dataset?.target || 'application';
    //             const title = button.dataset?.title || 'Заказать звонок';
    //             const additional = button.dataset?.additional || '';

    //             bodyLock(true);
    //             document.querySelector('html').style.paddingRight = setWidthScrollBar() + 'px';
    //             modalWindow.classList.add('active');
    //             modalWindow.querySelectorAll('.form').forEach((form) => {
    //                 if (form.getAttribute('data-target') === target) {
    //                     form.style.display = '';
    //                     form.querySelector('.form__title').innerText = title;

    //                     const addition = form.querySelector('.additional__field');
    //                     if (addition) {
    //                         addition.value = additional;
    //                     }
    //                 } else {
    //                     form.style.display = 'none';
    //                 }
    //             });
    //         });
    //     })

    //     modalButtonsCity.forEach((button) => {
    //         button.addEventListener('click', () => {
    //             const target = button.dataset?.target || 'application';
    //             const title = button.dataset?.title || 'Выберите филиал клиники доктора Калюжной';
    //             const additional = button.dataset?.additional || '';

    //             bodyLock(true);
    //             document.querySelector('html').style.paddingRight = setWidthScrollBar() + 'px';
    //             modalWindowCity.classList.add('active');
    //         });
    //     })
    // }

    // document.addEventListener('DOMContentLoaded', function () {
    //     const body = document.querySelector('.body');

    //     const menuBtns = document.querySelectorAll('button.menu__link');
    //     const menuSubBtns = document.querySelectorAll('button.menu__sub-link');

    //     if (menuBtns.length > 0) {
    //         menuBtns.forEach(function (menuBtn) {
    //             menuBtn.addEventListener('click', function () {
    //                 menuSubBtns.forEach(el => {
    //                     el.closest('.menu__sub-item').classList.remove('active');
    //                 });
    //                 menuBtns.forEach(el => {
    //                     if (el != this) {
    //                         el.closest('.menu__item').classList.remove('active');
    //                     }
    //                 });
    //                 menuBtn.closest('.menu__item').classList.toggle('active');
    //             });

    //             window.addEventListener('click', function (e) {
    //                 const target = e.target;
    //                 if (!target.closest('.menu__item')) {
    //                     menuBtn.classList.remove('active');
    //                 }
    //             });
    //         });
    //     }

    //     if (menuSubBtns.length > 0) {
    //         menuSubBtns.forEach(function (menuBtn) {
    //             menuBtn.addEventListener('click', function () {
    //                 menuSubBtns.forEach(el => {
    //                     if (el != this) {
    //                         el.closest('.menu__sub-item').classList.remove('active');
    //                     }
    //                 });
    //                 menuBtn.closest('.menu__sub-item').classList.add('active');
    //             });
    //         });
    //     }

    //     window.addEventListener('click', function (e) {
    //         const target = e.target;

    //         if (!target.closest('.menu__sub-item')) {
    //             menuSubBtns.forEach(el => {
    //                 el.closest('.menu__sub-item').classList.remove('active');
    //             });
    //         }

    //         if (!target.closest('.menu__item')) {
    //             menuBtns.forEach(el => {
    //                 el.closest('.menu__item').classList.remove('active');
    //             });
    //         }
    //     });

    //     // accordion
    //     const ACCORDION_LIST = 'data-accordion-list'
    //     const ACCORDION_BUTTON = 'data-accordion-button'
    //     const ACCORDION_ARROW = 'data-accordion-arrow'
    //     const ACCORDION_CONTENT = 'data-accordion-content'
    //     const SECTION_OPENED = 'active'
    //     const ICON_ROTATED = 'rotated'

    //     class Accordion {
    //         static apply(accordionNode) {
    //             if (!accordionNode) {
    //                 return
    //             }

    //             const acc = new Accordion()
    //             acc.accordion = accordionNode
    //             accordionNode.onclick = acc.onClick.bind(acc)
    //         }

    //         handleClick(button) {
    //             const innerSection = button.nextElementSibling
    //             const isOpened = innerSection.classList.contains(SECTION_OPENED)

    //             if (isOpened) {
    //                 this.close(innerSection)
    //                 return
    //             } else {
    //                 this.open(innerSection)

    //             }
    //         }

    //         open(section) {
    //             const accordion = section.querySelector(`[${ACCORDION_CONTENT}`).closest('.accor');
    //             const accordionContent = section.querySelector(`[${ACCORDION_CONTENT}`)
    //             const accordionList = accordionContent.querySelector(`[${ACCORDION_LIST}`)
    //             const innerSectionHeight = accordionContent.clientHeight
    //             let countOfScrollHeight = 0;
    //             const allElementContentData = section.querySelectorAll(`[${ACCORDION_CONTENT}`)
    //             accordion.classList.add(SECTION_OPENED)
    //             section.classList.add(SECTION_OPENED)
    //             this.rotateIconFor(section.previousElementSibling)

    //             for (const item of allElementContentData) {
    //                 countOfScrollHeight = countOfScrollHeight + item.scrollHeight;
    //             }

    //             if (accordionContent.contains(accordionList)) {
    //                 section.style.maxHeight = `${innerSectionHeight + countOfScrollHeight}px`
    //                 return
    //             }
    //             section.style.maxHeight = `${innerSectionHeight}px`
    //         }

    //         close(section) {
    //             const accordion = section.querySelector(`[${ACCORDION_CONTENT}`).closest('.accor');
    //             section.style.maxHeight = 0
    //             accordion.classList.remove(SECTION_OPENED)
    //             section.classList.remove(SECTION_OPENED)
    //             this.rotateIconFor(section.previousElementSibling)
    //         }

    //         rotateIconFor(button) {
    //             const rotatedIconClass = ICON_ROTATED
    //             const arrowElement = button.dataset.hasOwnProperty('accordionArrow') ?
    //                 button :
    //                 button.querySelector(`[${ACCORDION_ARROW}]`)

    //             if (!arrowElement) {
    //                 return
    //             }

    //             const isOpened = arrowElement.classList.contains(rotatedIconClass)
    //             if (!isOpened) {
    //                 arrowElement.classList.add(rotatedIconClass)
    //                 return
    //             }
    //             arrowElement.classList.remove(rotatedIconClass)
    //         }

    //         onClick(event) {
    //             let button = event.target.closest(`[${ACCORDION_BUTTON}]`)
    //             if (button && button.dataset.accordionButton !== undefined) {
    //                 this.handleClick(button)
    //             }
    //         }
    //     }

    //     const accorWrapperList = document.querySelectorAll('.accor-wrapper');

    //     if (accorWrapperList.length > 0) {
    //         accorWrapperList.forEach(function (elem) {
    //             if (elem.querySelector('.accor-open')) {
    //                 Accordion.apply(elem);
    //             }
    //         });
    //     }

    //     // header menu mobile
    //     let headerMenuButton = document.querySelector('.menu-burger');
    //     let headerMenu = document.querySelector('.mobile-menu');

    //     headerMenuButton.addEventListener('click', function () {
    //         headerMenuButton.classList.toggle('active');
    //         headerMenu.classList.toggle('active');
    //         if (headerMenu.classList.contains('active')) {
    //             body.classList.add('lock');
    //         } else {
    //             body.classList.remove('lock');
    //         }
    //     });

    //     Fancybox.bind('[data-fancybox="documents"]', {
    //         placeFocusBack: false,
    //     });

    //     const articleNavigation = document.querySelector('.article-navigation');

    //     if (articleNavigation) {
    //         const jsScrollBlockList = document.querySelectorAll('.article-navigation ~ section h2');

    //         if (jsScrollBlockList.length > 0) {
    //             for (let i = 0; i < jsScrollBlockList.length; i += 1) {
    //                 const jsScrollBlock = jsScrollBlockList[i];
    //                 const titleBlock = jsScrollBlock.textContent;
    //                 const articleNavigationList = document.querySelector('.article-navigation__list');
    //                 const articleNavigationItem = document.createElement('li');
    //                 const articleNavigationLink = document.createElement('a');
    //                 articleNavigationItem.classList.add('article-navigation__item');
    //                 articleNavigationLink.classList.add('article-navigation__link');
    //                 jsScrollBlock.setAttribute('id', `${i}`)
    //                 articleNavigationLink.setAttribute('href', `#${i}`);
    //                 articleNavigationLink.textContent = titleBlock;
    //                 articleNavigationItem.append(articleNavigationLink);
    //                 articleNavigationList.append(articleNavigationItem);
    //             }

    //             document.querySelectorAll('a[href^="#"').forEach(link => {

    //                 link.addEventListener('click', function (e) {
    //                     e.preventDefault();

    //                     let href = this.getAttribute('href').substring(1);

    //                     const scrollTarget = document.getElementById(href);

    //                     // const topOffset = document.querySelector('.scrollto').offsetHeight;
    //                     const topOffset = 80;
    //                     const elementPosition = scrollTarget.getBoundingClientRect().top;
    //                     const offsetPosition = elementPosition - topOffset;

    //                     window.scrollBy({
    //                         top: offsetPosition,
    //                         behavior: 'smooth'
    //                     });
    //                 });
    //             });
    //         }
    //     }

    //     // rating
    //     const ratings = document.querySelectorAll('.rating');
    //     let articleID = '';
    //     if (document.querySelector('[name="f_id_article"]')) {
    //         articleID = document.querySelector('[name="f_id_article"]').value;
    //     }

    //     if (ratings.length > 0) {
    //         initRatings();
    //     }

    //     function initRatings() {
    //         let ratingActive, ratingValue;

    //         for (let i = 0; i < ratings.length; i += 1) {
    //             const rating = ratings[i];
    //             initRating(rating);
    //         }
    //     }

    //     function initRating(rating) {
    //         initRatingVars(rating);

    //         setRatingActiveWidth();

    //         if (rating.classList.contains('rating__set')) {
    //             setRating(rating);
    //         }
    //     }

    //     function initRatingVars(rating) {
    //         ratingActive = rating.querySelector('.rating__active');
    //         ratingValue = rating.querySelector('.rating__value');
    //     }

    //     function setRatingActiveWidth(index = ratingValue.innerHTML) {
    //         const ratingActiveWidth = index / 0.05;
    //         ratingActive.style.width = `${ratingActiveWidth}%`;
    //     }

    //     function setRating(rating) {
    //         const ratingItems = rating.querySelectorAll('.rating__item');

    //         for (let i = 0; i < ratingItems.length; i += 1) {
    //             const ratingItem = ratingItems[i];

    //             ratingItem.addEventListener('mouseenter', (e) => {
    //                 initRatingVars(rating);

    //                 setRatingActiveWidth(ratingItem.value);
    //             });

    //             ratingItem.addEventListener('mouseleave', (e) => {
    //                 setRatingActiveWidth();
    //             });

    //             ratingItem.addEventListener('click', (e) => {
    //                 ratingItems.forEach((elem) => {
    //                     elem.style.pointerEvents = 'all';
    //                 });
    //                 ratingItem.style.pointerEvents = 'none';
    //                 initRatingVars(rating);

    //                 ratingValue.innerHTML = i + 1;
    //                 setRatingActiveWidth();

    //                 $.ajax({
    //                     url: '/ajax/',
    //                     type: "POST",
    //                     dataType: "html",
    //                     data: {
    //                         "ID_ARTICLE": articleID,
    //                         "RATING": ratingValue.innerHTML,
    //                     },
    //                     success: function (response) {
    //                     },
    //                     error: function (response) {
    //                         console.log(response);
    //                     }
    //                 });
    //             });
    //         }
    //     }
    //     initModalWorker();
    // });
})();


// ['load', 'resize'].forEach((event) => {
//     window.addEventListener(event, function () {
//         const header = document.querySelector('.header');
//         const main = document.querySelector('.main');
//         let headerHeight = header.clientHeight;
//         window.onscroll = function (e) {
//             if (window.innerWidth < 992) {

//                 if (window.scrollY > headerHeight) {
//                     if (!header.classList.contains('fixed')) {
//                         header.classList.add('fixed');
//                         main.style.marginTop = headerHeight + 'px';
//                     }
//                 }
//                 else {
//                     header.classList.remove('fixed');
//                     main.removeAttribute("style");

//                 }
//             }
//             else {
//                 header.classList.remove('fixed');
//                 main.removeAttribute("style");
//             }

//         };
//     })
// })

function setupLoadMore(selectorItem, selectorButton, initialCount, loadCount, displayStyle) {
    const items = document.querySelectorAll(selectorItem);
    const loadMoreButton = document.querySelector(selectorButton);

    if (items.length === 0 || !loadMoreButton) {
        return;
    }

    let currentIndex = 0;

    function hideAllItems() {
        items.forEach(item => {
            item.style.display = 'none';
        });
    }

    function showItems(count) {
        const itemsToShow = Array.from(items).slice(currentIndex, currentIndex + count);

        itemsToShow.forEach(item => {
            item.style.display = displayStyle;
        });

        currentIndex += count;

        if (currentIndex < items.length) {
            loadMoreButton.style.display = displayStyle;
        } else {
            loadMoreButton.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        hideAllItems();
        showItems(initialCount);
        loadMoreButton.addEventListener('click', () => {
            showItems(loadCount);
        });
    });
}

setupLoadMore('.smi-video__item', '.smi-video__button', 6, 3, 'block');
setupLoadMore('.smi-stati__item', '.smi-stati__button', 6, 3, 'flex');



function getHeight(el) {
    if (el) {
        return el.offsetHeight;
    }
}
function setBlockMinHeight(absoluteBlock, block) {
    const height = getHeight(document.querySelector(absoluteBlock));
    const blockDOM = document.querySelector(block);
    if (blockDOM) {
        blockDOM.style.minHeight = height + 'px';
    }
}




// more text
let windowWidth = document.body.clientWidth;
const moreBtnsList = document.querySelectorAll('.more-text-btn');
const moreTextList = document.querySelectorAll('.more-text');

if (windowWidth <= 575) {
    if (moreTextList.length > 0) {
        moreTextList.forEach(function (moreText) {
            const textWrapper = moreText.querySelector('.more-text-wrapper');
            const textContent = moreText.querySelector('.more-text-content');
            const heightTextContent = getHeight(textContent);
            const btnMore = moreText.querySelector('.more-text-btn');

            if (heightTextContent <= 140) {
                btnMore.style.display = 'none';
                textWrapper.style.height = 'auto';
            } else {
                btnMore.style.display = 'flex';
                textWrapper.style.height = 140 + 'px';
                btnMore.textContent = 'Показать полностью';
            }
        });
    }
} else {
    if (moreTextList.length > 0) {
        moreTextList.forEach(function (moreText) {
            const textWrapper = moreText.querySelector('.more-text-wrapper');
            const btnMore = moreText.querySelector('.more-text-btn');

            btnMore.style.display = 'none';
            textWrapper.style.height = 'auto';
        });
    }
}

window.addEventListener('resize', () => {
    if (windowWidth != document.body.clientWidth) {
        setBlockMinHeight('.doctor-page__picture', '.doctor-page');
        setBlockMinHeight('.article-detail__author', '.article-detail__wrapper');
        if (document.body.clientWidth <= 575) {
            if (moreTextList.length > 0) {
                moreTextList.forEach(function (moreText) {
                    const textWrapper = moreText.querySelector('.more-text-wrapper');
                    const textContent = moreText.querySelector('.more-text-content');
                    const heightTextContent = getHeight(textContent);
                    const btnMore = moreText.querySelector('.more-text-btn');

                    if (heightTextContent <= 140) {
                        btnMore.style.display = 'none';
                        textWrapper.style.height = 'auto';
                    } else {
                        btnMore.style.display = 'flex';
                        textWrapper.style.height = 140 + 'px';
                        btnMore.textContent = 'Показать полностью';
                    }
                });
            }
        } else {
            if (moreTextList.length > 0) {
                moreTextList.forEach(function (moreText) {
                    const textWrapper = moreText.querySelector('.more-text-wrapper');
                    const btnMore = moreText.querySelector('.more-text-btn');

                    btnMore.style.display = 'none';
                    textWrapper.style.height = 'auto';
                });
            }
        }
        windowWidth = document.body.clientWidth;
    }
});

if (moreBtnsList.length > 0) {
    moreBtnsList.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const textWrapper = btn.closest('.more-text').querySelector('.more-text-wrapper');
            const textContent = btn.closest('.more-text').querySelector('.more-text-content');
            const heightTextWrapper = getHeight(textWrapper);
            const heightTextContent = getHeight(textContent);
            if (heightTextContent > heightTextWrapper) {
                textWrapper.style.height = heightTextContent + 'px';
                btn.textContent = 'Скрыть';
            } else {
                textWrapper.style.height = 140 + 'px';
                btn.textContent = 'Показать полностью';
            }
        });
    })
}
