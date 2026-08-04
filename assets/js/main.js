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
    const menuMob = document.querySelector('.menu');

    document.querySelectorAll('.menu__item--submenu').forEach(item => {
        const openBtn = item.querySelector('.menu__toggle');
        const closeBtn = item.querySelector('.submenu__toggle');
        const submenu = item.querySelector('.submenu');
        const submenuList = item.querySelector('.submenu__list');

        openBtn.addEventListener('click', () => {
            submenu.classList.add('active');

            // Устанавливаем высоту меню по высоте подменю
            menuMob.style.minHeight = `${submenuList.scrollHeight}px`;

            // Поднимаем выбранный пункт к верху меню
            menuMob.scrollTop = item.offsetTop;
        });

        closeBtn.addEventListener('click', () => {
            submenu.classList.remove('active');

            // Возвращаем исходную высоту
            menuMob.style.minHeight = '400px';

            // Возвращаем меню в начало
            menuMob.scrollTop = 0;
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

        /* simple spoiler */
        document.querySelectorAll('[data-action="spoiler"]').forEach(function (element) {
            element.addEventListener('click', function () {
                let target = document.querySelector(`[data-spoiler="${this.dataset.target}"]`);
                if (target) {
                    target.classList.toggle('active');
                    const spoiler = element.querySelector('.spoiler')
                    if (spoiler) { spoiler.classList.toggle('active'); }
                }
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        const patientStoriesSwiper = new Swiper(".patientStoriesSwiper", {
            slidesPerView: 1.1,
            spaceBetween: 10,
            navigation: {
                nextEl: ".patient-stories__swiper-button-next",
                prevEl: ".patient-stories__swiper-button-prev"
            },
            pagination: {
                el: '.patient-stories__swiper-pagination',
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

        /* simple spoiler */
        document.querySelectorAll('[data-action="spoiler"]').forEach(function (element) {
            element.addEventListener('click', function () {
                let target = document.querySelector(`[data-spoiler="${this.dataset.target}"]`);
                if (target) {
                    target.classList.toggle('active');
                    const spoiler = element.querySelector('.spoiler')
                    if (spoiler) { spoiler.classList.toggle('active'); }
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
        const cards = document.querySelectorAll(".patient-stories__card-content");

        function checkCards() {
            cards.forEach((card) => {
                const text = card.querySelector("p");
                const btn = card.querySelector(".patient-stories__card-btn");

                if (!text || !btn) return;

                // Сбрасываем состояние перед проверкой
                text.classList.remove("hide");
                btn.classList.remove("active");
                btn.classList.remove("open");

                const limit = window.innerWidth <= 1025 ? 120 : 132;

                if (text.scrollHeight > limit) {
                    text.classList.add("hide");
                    btn.classList.add("active");
                }
            });
        }

        checkCards();

        let resizeTimer;
        window.addEventListener("resize", () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(checkCards, 150);
        });

        document.addEventListener("click", (e) => {
            const btn = e.target.closest(".patient-stories__card-btn");
            if (!btn || !btn.classList.contains("active")) return;

            const card = btn.closest(".patient-stories__card-content");
            const text = card.querySelector("p");

            text.classList.toggle("hide");
            btn.classList.toggle("open");
        });
    });


    document.addEventListener("DOMContentLoaded", () => {
        const accordions = document.querySelectorAll(".js-accordion");

        accordions.forEach((accordion) => {
            const trigger = accordion.querySelector(".js-accordion-trigger");
            const content = accordion.querySelector(".js-accordion-content");

            if (!trigger || !content) return;

            trigger.addEventListener("click", () => {
                if (accordion.classList.contains("is-open")) {
                    content.style.maxHeight = content.scrollHeight + "px";

                    requestAnimationFrame(() => {
                        accordion.classList.remove("is-open");
                        content.style.maxHeight = "0px";
                    });
                } else {
                    accordion.classList.add("is-open");

                    requestAnimationFrame(() => {
                        content.style.maxHeight = content.scrollHeight + "px";
                    });
                }
            });
        });

        window.addEventListener("resize", () => {
            accordions.forEach((accordion) => {
                if (!accordion.classList.contains("is-open")) return;

                const content = accordion.querySelector(".js-accordion-content");
                content.style.maxHeight = content.scrollHeight + "px";
            });
        });
    });



    const articleNavigation = document.querySelector(".navigation-js");
    if (articleNavigation) {
        const jsScrollBlockList = document.querySelectorAll(
            ".text-block__navigation h2",
        );

        if (jsScrollBlockList.length > 0) {
            for (let i = 0; i < jsScrollBlockList.length; i += 1) {
                const jsScrollBlock = jsScrollBlockList[i];
                const titleBlock = jsScrollBlock.textContent;
                const articleNavigationList =
                    document.querySelector(".navigation__list");
                const articleNavigationItem = document.createElement("li");
                const articleNavigationLink = document.createElement("a");
                articleNavigationItem.classList.add("navigation__item");
                jsScrollBlock.setAttribute("id", `section-${i}`);
                articleNavigationLink.setAttribute("href", `#section-${i}`);
                articleNavigationLink.textContent = " " + titleBlock;
                articleNavigationItem.append(articleNavigationLink);
                articleNavigationList.append(articleNavigationItem);
            }
            document.querySelectorAll('a[href^="#"]').forEach((link) => {
                link.addEventListener("click", function (e) {

                    let href = this.getAttribute("href").substring(1);
                    const scrollTarget = document.getElementById(href);
                    if (scrollTarget) {
                        const topOffset = 120;
                        const elementPosition = scrollTarget.getBoundingClientRect().top;
                        const offsetPosition = elementPosition - topOffset;
                        window.scrollBy({
                            top: offsetPosition,
                            behavior: "smooth",
                        });
                    }
                });
            });
        } else {
            const navigationList = articleNavigation.querySelector(".navigation__list");
            if (navigationList) {
                navigationList.remove();
            }
        }
    }

    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    if (tabBtns.length > 0 && tabContents.length > 0) {

        tabContents.forEach(content => content.classList.add('active'));

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const category = btn.dataset.faqCategory;

                tabBtns.forEach(item => item.classList.remove('active'));
                btn.classList.add('active');

                tabContents.forEach(content => content.classList.remove('active'));

                const activeContent = document.querySelector(
                    `.tab-content[data-faq-category="${category}"]`
                );

                if (activeContent) {
                    activeContent.classList.add('active');
                }
            });
        });
    }

})();


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




