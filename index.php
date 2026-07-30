<section class="anonymous-test section__general">
  <div class="anonymous-test__container container">
    <div class="anonymous-test__top section__top">
      <p class="anonymous-test__title section__title-general">
        ПЛП — <span>сопровождение после выписки</span>
      </p>
      <div class="anonymous-test__content">
        <div>
          <p class="anonymous-test__subtitle section__subtitle-general">Выписка — не конец программы. Первые месяцы после возвращения домой — самый уязвимый период. Наши кураторы остаются рядом.</p>
        </div>
      </div>
    </div>
    <div class="anonymous-test__wrapper">
      <div class="anonymous-test__main" id="anonymous-test__main">
        <div class="tabs">
          <button class="anonymous-test__tab active" data-test="adult">Для взрослых</button>
          <button class="anonymous-test__tab" data-test="parent">Родителям о ребенке</button>
          <button class="anonymous-test__tab" data-test="express">Экспресс-тест</button>
        </div>
        <div class="anonymous-test__question"></div>
        <div class="anonymous-testanswers"></div>
        <div class="anonymous-testbottom">
          <button id="anonymous-test__prev">Назад</button>
          <span><span id="anonymous-test__current">1</span>/<span id="anonymous-test__total">4</span></span>
          <button id="anonymous-test__next">Далее</button>
        </div>
      </div>
    </div>
  </div>
  <pre class="anonymous-test__analis"></pre>
</section>

<script>
  const tests = {
    adult: {
      name: "Для взрослых",
      questions: [{
          question: "Как часто в последние 6 месяцев употреблялось алкоголь или ПАВ?",
          answers: ["Никогда", "Иногда", "Регулярно", "Ежедневно"]
        },
        {
          question: "Были ли проблемы из-за употребления?",
          answers: ["Нет", "Редко", "Иногда", "Часто"]
        },
        {
          question: "Пытались отказаться?",
          answers: ["Нет", "1 раз", "Несколько раз", "Постоянно"]
        },
        {
          question: "Есть желание изменить ситуацию?",
          answers: ["Нет", "Скорее нет", "Скорее да", "Да"]
        }
      ]
    },

    parent: {
      name: "Родителям о ребенке",
      questions: [{
          question: "Замечали изменения поведения?",
          answers: ["Нет", "Иногда", "Часто", "Постоянно"]
        },
        {
          question: "Появились новые подозрительные друзья?",
          answers: ["Нет", "Не знаю", "Да", "Много"]
        },
        {
          question: "Ребенок скрывает информацию?",
          answers: ["Нет", "Редко", "Иногда", "Постоянно"]
        },
        {
          question: "Есть повод обратиться к специалисту?",
          answers: ["Нет", "Возможно", "Да", "Срочно"]
        }
      ]
    },

    express: {
      name: "Экспресс-тест",
      questions: [{
          question: "Употребляли алкоголь за последний месяц?",
          answers: ["Нет", "1-2 раза", "Несколько раз", "Часто"]
        },
        {
          question: "Испытывали желание употребить?",
          answers: ["Нет", "Редко", "Иногда", "Постоянно"]
        },
        {
          question: "Мешает ли это жизни?",
          answers: ["Нет", "Немного", "Да", "Очень"]
        },
        {
          question: "Хотите получить помощь?",
          answers: ["Нет", "Не знаю", "Да", "Срочно"]
        }
      ]
    }
  };

  let currentTest = "adult";
  let currentQuestion = 0;
  let userAnswers = [];

  const question = document.querySelector(".question");
  const answers = document.querySelector(".answers");
  const analis = document.querySelector(".analis");

  const current = document.getElementById("current");
  const total = document.getElementById("total");

  function render() {

    const test = tests[currentTest];
    const q = test.questions[currentQuestion];

    question.textContent = q.question;

    answers.innerHTML = "";

    q.answers.forEach((text, index) => {

      const label = document.createElement("label");

      label.innerHTML = `
            <input type="radio" name="answer" value="${index}">
            ${text}
        `;

      if (userAnswers[currentQuestion] === index) {
        label.querySelector("input").checked = true;
      }

      label.querySelector("input").onchange = () => {
        userAnswers[currentQuestion] = index;
      };

      answers.appendChild(label);

    });

    current.textContent = currentQuestion + 1;
    total.textContent = test.questions.length;

    document.getElementById("prev").disabled = currentQuestion === 0;

    document.getElementById("next").textContent =
      currentQuestion === test.questions.length - 1 ?
      "Завершить" :
      "Далее";
  }

  render();

  document.getElementById("prev").onclick = () => {

    if (currentQuestion > 0) {
      currentQuestion--;
      render();
    }

  };

  document.getElementById("next").onclick = () => {

    const test = tests[currentTest];

    if (currentQuestion < test.questions.length - 1) {

      currentQuestion++;
      render();
      return;
    }

    const result = {
      test: test.name,
      answers: test.questions.map((q, i) => ({
        question: q.question,
        answer: userAnswers[i] != null ?
          q.answers[userAnswers[i]] : null
      }))
    };

    analis.textContent = JSON.stringify(result, null, 4);

  };

  document.querySelectorAll(".anonymous-test__tab").forEach(btn => {

    btn.onclick = () => {

      document.querySelectorAll(".anonymous-test__tab").forEach(x => x.classList.remove("active"));
      btn.classList.add("active");

      currentTest = btn.dataset.test;

      // Сброс предыдущего теста
      currentQuestion = 0;
      userAnswers = [];
      analis.textContent = "";

      render();

    };

  });
</script>