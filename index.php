   <section class="faq section__general">
      <div class="faq__container container">
        <div class="faq__wrapper">
          <div class="faq__top section__top">
            <p class="faq__title section__title-general">
              <span>Вопросы</span> и ответы
            </p>
            <p class="faq__subtitle faq__subtitle--top section__subtitle-general">
              Если у вас еще остались вопросы, можете задать нам, и наши консультанты ответят анонимно в любое время
              суток</p>

          </div>
          <style>
            .faq__btns {
              display: flex;
              flex-direction: column;
              gap: 8px;
            }

            .faq__btn {
              background: var(--fonovyy);
            }


            .js-accordion-trigger {
              display: flex;
              justify-content: space-between;
              align-items: center;
              gap: 20px;
              cursor: pointer;
            }

            .js-accordion-content {
              max-height: 0;
              overflow: hidden;
              transition: max-height .35s ease;
            }

            .accordion-icon {
              position: relative;
              width: 22px;
              height: 22px;
              flex-shrink: 0;
            }

            .accordion-icon span {
              position: absolute;
              left: 50%;
              top: 50%;
              width: 22px;
              height: 2px;
              background: currentColor;
              border-radius: 2px;
              transform: translate(-50%, -50%);
              transition: transform .3s ease;
            }

            .accordion-icon span:last-child {
              transform: translate(-50%, -50%) rotate(90deg);
            }

            .js-accordion.is-open .accordion-icon span:last-child {
              transform: translate(-50%, -50%) rotate(0deg);
            }
            
            .faq__item-question {
              
            }
          </style>

          <div class="faq__item js-accordion">
            <div class="faq__item-question js-accordion-trigger">
              <p>Лечите ли вы нехимические зависимости?</p>

              <span class="accordion-icon" aria-hidden="true">
                <span></span>
                <span></span>
              </span>
            </div>

            <div class="faq__item-answer js-accordion-content">
              <p>
                «Самое ценное – это обретённая свобода и возможность начать всё с чистого листа...»
              </p>
            </div>
          </div>
          <div class="faq__btns">
            <button class="faq__btn primary-btn  popup-btn" data-path="popup-sing">
              <i></i>Задать вопрос<span></span>
            </button>
            <button class="faq__btn tertiary-btn  popup-btn" data-path="popup-program">
              <i></i>Написать нам в онлайн-чат<span><svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 16L6.68516 8L0 0H3.29412L10 8L3.29412 16H0Z" fill="#07253F"></path>
                </svg>
              </span>
            </button>
          </div>
        </div>
      </div>
    </section>