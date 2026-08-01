const tests = {
    adult: {
        name: "Для взрослых",
        questions: [
            {
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
        questions: [
            {
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
        questions: [
            {
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

const question = document.querySelector(".anonymous-test__question");
const answers = document.querySelector(".anonymous-test__answers");
const analis = document.querySelector(".anonymous-test__analis");

const current = document.getElementById("anonymous-test__current");
const total = document.getElementById("anonymous-test__total");

const prevBtn = document.getElementById("anonymous-test__prev");
const nextBtn = document.getElementById("anonymous-test__next");
const resultBtn = document.querySelector(".anonymous-test__btn");

function updateButtons() {
    const test = tests[currentTest];
    const isLast = currentQuestion === test.questions.length - 1;
    const answered = userAnswers[currentQuestion] !== undefined;

    // Назад
    prevBtn.disabled = currentQuestion === 0;
    prevBtn.classList.toggle("active", currentQuestion > 0);

    // Последний вопрос
    if (isLast) {
        nextBtn.innerHTML =
            '<img src="assets/img/icons/test-res.svg" alt="рестарт">';
        nextBtn.classList.add("active");
        nextBtn.disabled = false;

        resultBtn.classList.toggle("active", answered);
    } else {
        nextBtn.textContent = "Далее";
        nextBtn.disabled = !answered;
        nextBtn.classList.toggle("active", answered);

        resultBtn.classList.remove("active");
    }
}

function render() {
    const test = tests[currentTest];
    const q = test.questions[currentQuestion];

    question.textContent = q.question;
    answers.innerHTML = "";

    q.answers.forEach((text, index) => {
        const label = document.createElement("label");
        label.className = "anonymous-test__answer";

        label.innerHTML = `
      <input type="radio" name="anonymous-answer" value="${index}"><span class="anonymous-test__radio"><span></span></span>
      <span>${text}</span>
    `;

        const input = label.querySelector("input");

        if (userAnswers[currentQuestion] === index) {
            input.checked = true;
        }

        if (userAnswers[currentQuestion] === index) {
            label.classList.add("active");
        }

        input.addEventListener("change", () => {
            userAnswers[currentQuestion] = index;
            answers
                .querySelectorAll(".anonymous-test__answer")
                .forEach(item => item.classList.remove("active"));

            // добавляем active выбранному
            label.classList.add("active");
            updateButtons();
        });

        answers.appendChild(label);
    });

    current.textContent = currentQuestion + 1;
    total.textContent = test.questions.length;

    updateButtons();
}

render();

prevBtn.addEventListener("click", () => {
    if (currentQuestion > 0) {
        currentQuestion--;
        render();
    }
});

nextBtn.addEventListener("click", () => {
    const test = tests[currentTest];
    const isLast = currentQuestion === test.questions.length - 1;

    // Последний вопрос = рестарт
    if (isLast) {
        currentQuestion = 0;
        userAnswers = [];
        analis.textContent = "";
        resultBtn.classList.remove("active");
        render();
        return;
    }

    // Пока ответ не выбран — дальше нельзя
    if (nextBtn.disabled) return;

    currentQuestion++;
    render();
});

// Получение результатов
resultBtn.addEventListener("click", () => {
    const test = tests[currentTest];

    const result = {
        test: test.name,
        answers: test.questions.map((q, i) => ({
            question: q.question,
            answer:
                userAnswers[i] !== undefined
                    ? q.answers[userAnswers[i]]
                    : null
        }))
    };

    analis.textContent = JSON.stringify(result, null, 4);
});

document.querySelectorAll(".anonymous-test__tab").forEach(tab => {
    tab.addEventListener("click", () => {
        document
            .querySelectorAll(".anonymous-test__tab")
            .forEach(btn => btn.classList.remove("active"));

        tab.classList.add("active");

        currentTest = tab.dataset.test;
        currentQuestion = 0;
        userAnswers = [];
        analis.textContent = "";

        resultBtn.classList.remove("active");

        render();
    });
});