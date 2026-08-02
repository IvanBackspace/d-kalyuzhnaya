  <section class="useful-resources section__general">
      <style>
        .useful-resources__items {
          width: 810px;
          display: flex;
          gap: 10px;
          align-items: center;
        }

        .useful-resources__item {
          flex: 0 0 calc((100% - 20px)/3);
          border-radius: 26px;
          padding: 19px;
          background: var(--fonovyy);
          gap: 32px;
          align-items: center;
          transition: border .3s;
        }

        .useful-resources__item:hover {
          border: 1px solid #eb591f;
        }

        .useful-resources__item-read,
        .useful-resources__item-name {
          border-radius: 10px;
          padding: 6px 10px;
          background: var(--belyy-100);
          font-family: var(--second-family);
          font-weight: 700;
          font-size: 9px;
          line-height: 133%;
          text-transform: uppercase;
          text-align: center;
          color: var(--tekst-dark-100);
        }

        .useful-resources__item-date {
          font-weight: 500;
          font-size: 12px;
          text-align: center;
          margin-bottom: 12px;
          color: var(--tekst-dark-60);
        }

        .useful-resources__item-title {
          font-family: var(--second-family);
          font-weight: 700;
          font-size: 14px;
          line-height: 129%;
          text-transform: uppercase;
          text-align: center;
          color: var(--tekst-dark-100);
        }

        .useful-resources__item-read {
          border-radius: 40px;
          padding: 16px 18px;
          background: var(--belyy-100);
          width: fit-content;
        }
      </style>
      <div class="useful-resources__container container">
        <div class="useful-resources__wrapper">
          <div class="useful-resources__top section__top">
            <div>
              <p class="useful-resources__title section__title-general">
                <span>Полезные материалы</span> от врачей
              </p>
              <p class="useful-resources__subtitle section__subtitle-general">
                Статьи от врачей нашей наркологической клиники о всех  видах зависимостей и способах её лечения
              </p>
            </div>
            <a class="useful-resources__link primary-link" href="№">
              <i></i>Смотреть весь блог<span></span>
            </a>
          </div>

          <div class="useful-resources__main">
            <div class="useful-resources__items">
              <a class="useful-resources__item" href="#">
                <p class="useful-resources__item-name">
                  Ситенкова К. В. (Психиатр-нарколог)
                </p>
                <div class="useful-resources__item-main">
                  <p class="useful-resources__item-date">
                    15 марта 2025
                  </p>
                  <p class="useful-resources__item-title">
                    Передозировка габапентином: симптомы, первая помощь, лечение
                    в стационаре
                  </p>
                </div>
                <p class="useful-resources__item-read">
                  Читать статью
                </p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>