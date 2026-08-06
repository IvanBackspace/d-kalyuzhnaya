document.addEventListener("DOMContentLoaded", function () {
    (() => {
        const PLAYER_SELECTOR = ".audio-player";
        const WAVE_SELECTOR = ".audio-player__wave";
        const BAR_SELECTOR = ".audio-player__bar";
        const BTN_SELECTOR = ".audio-player__btn";
        const TIME_SELECTOR = ".audio-player__time";
        const AllTIME_SELECTOR = ".audio-player__time-all";

        const BAR_WIDTH = 4;
        const BAR_GAP = 3;
        const BAR_STEP = BAR_WIDTH + BAR_GAP;

        function formatTime(seconds) {
            if (!Number.isFinite(seconds)) return "00:00";
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${String(mins).padStart(2, "0")}:${String(secs).padStart(2, "0")}`;
        }

        function generateBarHeights(count) {
            const heights = [];

            for (let i = 0; i < count; i++) {
                const t = i / Math.max(count - 1, 1);

                const base = 10 + Math.abs(Math.sin(t * 8.5)) * 14 + Math.abs(Math.cos(t * 17)) * 8 + Math.abs(Math.sin((t + 0.3) * 31)) * 10;

                heights.push(Math.round(Math.min(base, 52)));
            }

            return heights;
        }

        function getBarsCount(containerWidth) {
            return Math.max(1, Math.floor((containerWidth + BAR_GAP) / BAR_STEP));
        }

        function renderWave(player) {
            const wave = player.querySelector(WAVE_SELECTOR);
            const audio = player.querySelector("audio");

            if (!wave) return;

            const width = wave.clientWidth;
            if (!width) return;

            const barsCount = getBarsCount(width);
            const prevCount = Number(wave.dataset.count || 0);

            if (prevCount === barsCount) return;

            const progress = audio && audio.duration ? audio.currentTime / audio.duration : 0;

            wave.innerHTML = "";
            wave.dataset.count = String(barsCount);

            const heights = generateBarHeights(barsCount);

            heights.forEach((height, index) => {
                const bar = document.createElement("div");
                bar.className = BAR_SELECTOR.slice(1);
                bar.style.height = `${height}px`;

                if (index < Math.floor(progress * barsCount)) {
                    bar.classList.add("is-active");
                }

                wave.appendChild(bar);
            });
        }

        function updateProgress(player) {
            const audio = player.querySelector("audio");
            const time = player.querySelector(TIME_SELECTOR);
            const bars = player.querySelectorAll(BAR_SELECTOR);

            if (!audio || !time || !bars.length) return;

            time.textContent = formatTime(audio.currentTime);

            const progress = audio.duration ? audio.currentTime / audio.duration : 0;
            const activeCount = Math.floor(progress * bars.length);

            bars.forEach((bar, index) => {
                bar.classList.toggle("is-active", index < activeCount);
            });
        }

        function pauseOtherPlayers(currentPlayer) {
            document.querySelectorAll(PLAYER_SELECTOR).forEach((player) => {
                if (player === currentPlayer) return;

                const audio = player.querySelector("audio");
                const btn = player.querySelector(BTN_SELECTOR);

                if (audio && !audio.paused) {
                    audio.pause();
                }

                if (btn) {
                    btn.textContent = "▶";
                }
            });
        }

        function initPlayer(player) {
            const audio = player.querySelector("audio");
            const btn = player.querySelector(BTN_SELECTOR);
            const time = player.querySelector(TIME_SELECTOR);
            const timeAll = player.querySelector(AllTIME_SELECTOR);

            if (!audio || !btn || !time) return;

            renderWave(player);

            audio.addEventListener("loadedmetadata", () => {
                time.textContent = "00:00";

                if (Number.isFinite(audio.duration)) {
                    timeAll.textContent = formatTime(audio.duration);
                }

                renderWave(player);
                updateProgress(player);
            });

            audio.addEventListener("timeupdate", () => {
                updateProgress(player);
            });

            audio.addEventListener("play", () => {
                pauseOtherPlayers(player);
                btn.textContent = "❚❚";
            });

            audio.addEventListener("pause", () => {
                if (!audio.ended) {
                    btn.textContent = "▶";
                }
            });

            audio.addEventListener("ended", () => {
                btn.textContent = "▶";
                updateProgress(player);
            });

            btn.addEventListener("click", async () => {
                if (audio.paused) {
                    pauseOtherPlayers(player);
                    try {
                        await audio.play();
                        btn.textContent = "❚❚";
                    } catch (error) {
                        console.error("Ошибка воспроизведения аудио:", error);
                    }
                } else {
                    audio.pause();
                    btn.textContent = "▶";
                }
            });
        }

        const players = document.querySelectorAll(PLAYER_SELECTOR);
        players.forEach(initPlayer);

        let resizeTimeout = null;

        window.addEventListener("resize", () => {
            clearTimeout(resizeTimeout);

            resizeTimeout = setTimeout(() => {
                document.querySelectorAll(PLAYER_SELECTOR).forEach((player) => {
                    renderWave(player);
                    updateProgress(player);
                });
            }, 100);
        });
    })();
});