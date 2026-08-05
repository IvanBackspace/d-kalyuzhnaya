(() => {
    document.addEventListener('DOMContentLoaded', function () {
        const burger = document.getElementById('burger');
        const burgerMob = document.getElementById('burger--mob');
        const menu = document.getElementById('header__bottom-info');

        function toggleMenu() {
            menu.classList.toggle('active');
            burger.classList.toggle('active');
            burgerMob.classList.toggle('active');
        }

        burger.addEventListener('click', toggleMenu);
        burgerMob.addEventListener('click', toggleMenu);

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
                const submenuItems = item.querySelector('.submenu__items');

                if (submenuItems) {
                    menuMob.style.minHeight = `${submenuItems.scrollHeight}px`;
                } else {
                    menuMob.style.minHeight = `${submenuList.scrollHeight}px`;
                }

                menuMob.scrollTop = item.offsetTop;
            });

            closeBtn.addEventListener('click', () => {
                submenu.classList.remove('active');

                menuMob.style.minHeight = '400px';
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

        document.querySelectorAll('.fServices--more').forEach(button => {
            button.addEventListener('click', function () {
                const services = this.closest('.footer__item--services');
                if (!services) return;

                services.classList.toggle('active');

                const textNode = this.childNodes[0];

                if (services.classList.contains('active')) {
                    textNode.textContent = 'Убрать все';
                } else {
                    textNode.textContent = 'Показать все';
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
        const patientStoriesSwiperDoc = new Swiper(".patientStoriesSwiperDoc", {
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
                1520: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                1380: {
                    slidesPerView: 1.3,
                    spaceBetween: 20
                },
                1210: {
                    slidesPerView: 1.2,
                    spaceBetween: 10
                },
                690: {
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

    document.addEventListener("DOMContentLoaded", () => {

        const articleNavigation = document.querySelector(".navigation-js");
        if (articleNavigation) {
            const jsScrollBlockList = document.querySelectorAll(
                ".text-block__navigation h2, .text-block__navigation h3",
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

        function initTabs() {
            const tabBtns = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');
            const faqTabs = document.querySelector('.faq-page__tabs');
            const priceTabs = document.querySelector('.price__tabs');
            const insideCenterTabs = document.querySelector('.inside-center__tabs');

            if (!tabBtns.length || !tabContents.length) return;

            if (faqTabs) {
                tabContents.forEach(content => content.classList.add('active'));
            }

            tabBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const [attr, value] = Object.entries(btn.dataset)[0] || [];

                    if (!attr) return;

                    tabBtns.forEach(item => item.classList.remove('active'));
                    btn.classList.add('active');

                    tabContents.forEach(content => content.classList.remove('active'));

                    const activeContent = [...tabContents].find(
                        content => content.dataset[attr] === value
                    );

                    if (activeContent) {
                        activeContent.classList.add('active');
                    }
                });
            });
        }

        initTabs('faqCategory');
    });
    document.addEventListener("DOMContentLoaded", () => {

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
    });

    document.addEventListener("DOMContentLoaded", function () {
        function popupClose(popupActive) {
            popupActive.classList.remove('open');
            setTimeout(() => {
                popupActive.classList.contains("open") || popupActive.classList.remove("active");
            }, 400);
            document.body.classList.remove('lock');
            document.querySelector('html').style.paddingRight = 0;
            document.querySelector('html').classList.remove('lock');
            document.querySelector('header').removeAttribute('style');
        }
        const popupOpenBtns = document.querySelectorAll('.popup-btn');
        const popups = document.querySelectorAll('.popup');
        const closePopupBtns = document.querySelectorAll('.close-popup');
        closePopupBtns.forEach(function (el) {
            el.addEventListener('click', function (e) {
                popupClose(e.target.closest('.popup'));
            });
        });
        if (popups.length > 0) {
            popups.forEach(function (popup) {
                popupClose(popup);
                popup.addEventListener('click', function (e) {
                    if (!e.target.closest('.popup__content')) {

                        popupClose(e.target.closest('.popup'));
                    }
                });
            });
        }
        popupOpenBtns.forEach(function (el) {
            el.addEventListener('click', function (e) {
                e.preventDefault();
                const path = e.currentTarget.dataset.path;
                const currentPopup = document.querySelector(`[data-target="${path}"]`);
                if (currentPopup) {
                    currentPopup.classList.add('active');
                    setTimeout(() => {
                        currentPopup.classList.add("open");
                    }, 10);
                    if (currentPopup.getAttribute("data-target") == 'popup-change') {
                        let currentItem = el.closest('.change-item');
                        let originalTop = currentPopup.querySelector('.original-title');
                        let title = currentItem.querySelector('.change-title');
                        let subtitle = currentItem.querySelector('.change-subtitle');
                        if (title && subtitle) {
                            var newTitle = title.innerHTML + ' ' + subtitle.innerHTML;
                        } else if (title) {
                            var newTitle = title.innerHTML;
                        } else {
                            var newTitle = subtitle.innerHTML;
                        }
                        if (el.classList.contains('change-doctor')) {
                            newTitle = 'Р—Р°РїРёСЃР°С‚СЊСЃСЏ РЅР° РїСЂРёС‘Рј Рє РІСЂР°С‡Сѓ: ' + newTitle;
                        }
                        originalTop.innerHTML = newTitle;
                    };
                    document.querySelector('html').classList.add('lock');
                }
            });
        });
    });

})();


// new
document.addEventListener("DOMContentLoaded", () => {
    const pathRemissionSwiper = new Swiper(".pathRemissionSwiper", {
        slidesPerView: 1.1,
        spaceBetween: 10,
        navigation: {
            nextEl: ".path-remission__swiper-button-next",
            prevEl: ".path-remission__swiper-button-prev"
        },
        pagination: {
            el: '.path-remission__swiper-pagination',
            type: 'custom',
            renderCustom: function (swiper, current, total) {
                const currentFormatted = String(current).padStart(2, '0');
                const totalFormatted = String(total).padStart(2, '0');
                return `<span class="pagination-current">${currentFormatted}</span> / <span class="pagination-total">${totalFormatted}</span>`;
            }
        },
        grabCursor: true,
        autoHeight: false,
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
});
