document.addEventListener('DOMContentLoaded', () => {
    const gridContainer = document.getElementById('grid-container');
    const gameStatus = document.getElementById('game-status');
    const triviaModal = document.getElementById('trivia-modal');
    const wrongModal = document.getElementById('wrong-modal');
    const winnerModal = document.getElementById('winner-modal');
    const slidingOverlay = document.getElementById('sliding-puzzle-overlay');

    // Game Data
    const wrongMessages = [
        { title: "HALA!!", text: "Ay sus, bokya ka!" },
        { title: "NGEK!!", text: "Mali yung napili mo!" },
        { title: "SAYANG!!", text: "Hindi sila match, try again!" },
        { title: "AYYY!!", text: "Malayo sa katotohanan!" },
        { title: "OPPS!!", text: "Better luck next flip!" },
        { title: "NGI!!", text: "Mali Ngani!" },
        { title: "MALI!!", text: "Wag kang magkamali!" },
        { title: "Oopsie!!", text: "Wrong choice!" },
    ];

    const triviaQuestions = [
        {
            question: "Ano ang pambansang bulaklak ng Pilipinas?",
            options: ["Sampaguita", "Ilang-ilang", "Gumamela", "Waling-waling"],
            answer: 0
        },
        {
            question: "Sino ang unang pangulo ng Pilipinas?",
            options: ["Andres Bonifacio", "Emilio Aguinaldo", "Jose Rizal", "Apolinario Mabini"],
            answer: 1
        },
        {
            question: "Ano ang ibig sabihin ng GCO?",
            options: ["Guidance and Counseling Office", "General Campus Office", "Guidance and Clinic Office", "Graduation and Clearance Office"],
            answer: 0
        },
        {
            question: "Anong floor matatagpuan ang Clinic (Health Services Unit)?",
            options: ["Ground Floor", "2nd Floor", "4th Floor", "6th Floor"],
            answer: 2
        },
        {
            question: "Ano ang ibig sabihin ng FIT?",
            options: ["Far Eastern Information Technology", "FEU Institute of Technology", "FEU Information Technology", "Foundation of Information Technology"],
            answer: 1
        },
        {
            question: "Anong floor ang mga computer lab ng FIT?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Saan matatagpuan ang Registrar?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Anong floor ang mga computer lab ng FIT?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Anong floor ang mga computer lab ng FIT?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Anong floor ang mga computer lab ng FIT?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Anong floor ang mga computer lab ng FIT?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Saan matatagpuan ang Dean's Office?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Saan matatagpuan ang Finance Office?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Saan matatagpuan ang Guidance Office?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Saan matatagpuan ang Admissions Office?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Saan matatagpuan ang Canteen?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Saan matatagpuan ang Library?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Saan matatagpuan ang EdiTH Office?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },
        {
            question: "Saan matatagpuan ang Accounting Office?",
            options: ["14th Floor", "12th Floor", "4th Floor", "6th Floor"],
            answer: 1
        },

    ];

    // Cards setup (12 pairs + 1 special)
    const cardIcons = ['🚀', '🛸', '🛰️', '🧑‍🚀', '🌌', '☄️', '🌙', '🌞', '🌎', '🪐', '🌟', '👾'];
    let cards = [];

    // Create pairs
    for (let i = 0; i < 12; i++) {
        cards.push({ id: i, icon: cardIcons[i], isSpecial: false });
        cards.push({ id: i, icon: cardIcons[i], isSpecial: false });
    }
    // Add special card
    cards.push({ id: 99, icon: '🦁', isSpecial: true });

    // Shuffle cards
    cards.sort(() => Math.random() - 0.5);

    let firstCard = null;
    let secondCard = null;
    let lockBoard = false;
    let matchedPairs = 0;
    let specialFound = false;

    // Initialize Game Board
    cards.forEach((card, index) => {
        const cardElement = document.createElement('div');
        cardElement.classList.add('card');
        cardElement.dataset.index = index;

        cardElement.innerHTML = `
            <div class="card-face card-front">
                <img src="assets/Paraverse logo/ParaverseLogo.svg" alt="Paraverse Logo" class="card-logo-img">
                <div class="card-text">PARAVERSE</div>
            </div>
            <div class="card-face card-back">
                <div class="emoji">${card.icon}</div>
                ${card.isSpecial ? '<div class="card-title">QUESTION!</div><div class="card-desc">Sino ang unang pangulo ng Pilipinas?</div>' : ''}
            </div>
        `;

        cardElement.addEventListener('click', flipCard);
        gridContainer.appendChild(cardElement);
    });

    function flipCard() {
        if (lockBoard) return;
        if (this === firstCard) return;

        this.classList.add('flipped');

        const cardData = cards[this.dataset.index];

        // Handle Special Card
        if (cardData.isSpecial) {
            setupTrivia(this);
            showModal(triviaModal);
            return;
        }

        if (!firstCard) {
            firstCard = this;
            return;
        }

        secondCard = this;
        checkForMatch();
    }

    function checkForMatch() {
        const firstData = cards[firstCard.dataset.index];
        const secondData = cards[secondCard.dataset.index];

        const isMatch = firstData.id === secondData.id;

        if (isMatch) {
            disableCards();
            matchedPairs++;
            checkGameWin();
        } else {
            unflipCards();
        }
    }

    function disableCards() {
        firstCard.removeEventListener('click', flipCard);
        secondCard.removeEventListener('click', flipCard);
        resetBoard();
    }

    function setupTrivia(specialCardElement) {
        const randomTrivia = triviaQuestions[Math.floor(Math.random() * triviaQuestions.length)];
        document.getElementById('trivia-text').innerText = randomTrivia.question;
        const optionsContainer = document.getElementById('trivia-options');
        optionsContainer.innerHTML = '';

        randomTrivia.options.forEach((opt, index) => {
            const btn = document.createElement('button');
            btn.classList.add('trivia-btn');
            btn.innerText = opt;
            btn.onclick = () => {
                Array.from(optionsContainer.children).forEach(b => b.disabled = true);
                if (index === randomTrivia.answer) {
                    btn.classList.add('correct');
                    setTimeout(() => {
                        specialFound = true;
                        closeModal('trivia-modal');

                        // Update the card text to show it's answered
                        const cardBack = specialCardElement.querySelector('.card-back');
                        if (cardBack) {
                            cardBack.innerHTML = '<div class="emoji">✅</div><div class="card-title" style="color: #28a745;">ANSWERED!</div><div class="card-desc">Trivia solved</div>';
                        }

                        specialCardElement.removeEventListener('click', flipCard);
                        checkGameWin();
                    }, 1000);
                } else {
                    btn.classList.add('wrong');
                    setTimeout(() => {
                        closeModal('trivia-modal');
                        specialCardElement.classList.remove('flipped');
                    }, 1000);
                }
            };
            optionsContainer.appendChild(btn);
        });
    }

    function unflipCards() {
        lockBoard = true;

        const randomMsg = wrongMessages[Math.floor(Math.random() * wrongMessages.length)];
        document.getElementById('wrong-heading').innerText = randomMsg.title;
        document.getElementById('wrong-text').innerText = randomMsg.text;

        setTimeout(() => {
            showModal(wrongModal);
        }, 500);
    }

    function resetBoard() {
        [firstCard, secondCard, lockBoard] = [null, null, false];
    }

    function checkGameWin() {
        // Win condition: 12 pairs matched and 1 special card found
        if (matchedPairs === 12 && specialFound) {
            gameStatus.innerText = 'SLIDING PUZZLE';
            setTimeout(() => {
                initSlidingPuzzle();
            }, 1000);
        }
    }

    // Modal functions
    window.showModal = (modal) => {
        modal.classList.add('active');
    };

    window.closeModal = (id) => {
        const modal = document.getElementById(id);
        if (!modal.classList.contains('active')) return;
        modal.classList.remove('active');

        if (id === 'wrong-modal' && lockBoard) {
            if (firstCard && secondCard) {
                firstCard.classList.remove('flipped');
                secondCard.classList.remove('flipped');
                resetBoard();
            }
        }

        if (id === 'trivia-modal' && !specialFound) {
            const specialIndex = cards.findIndex(c => c.isSpecial);
            const specialCardEl = document.querySelector(`.card.flipped[data-index="${specialIndex}"]`);
            if (specialCardEl) {
                specialCardEl.classList.remove('flipped');
            }
        }
    };

    document.querySelectorAll('.modal-overlay, .overlay').forEach(overlay => {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                if (overlay.id === 'sliding-puzzle-overlay') {
                    // Do nothing or maybe give up? Usually sliding puzzle overlay doesn't close on click outside.
                    // Let's just ignore it or let give up handle it.
                } else {
                    closeModal(overlay.id);
                }
            }
        });
    });

    // --- Sliding Puzzle Logic ---
    const slidingGrid = document.getElementById('sliding-grid');
    const movesCountEl = document.getElementById('moves-count');
    const timeLeftEl = document.getElementById('time-left');
    const timeProgressEl = document.getElementById('time-progress');

    let tiles = [1, 2, 3, 4, 5, 6, 7, 8, 0]; // 0 is empty
    let moves = 0;
    let timer;
    let secondsLeft = 179; // 2:59
    let puzzleActive = false;

    function initSlidingPuzzle() {
        slidingOverlay.classList.add('active');
        moves = 0;
        movesCountEl.innerText = moves;
        puzzleActive = true;

        // Shuffle tiles safely
        shuffleSlidingPuzzle();
        renderSlidingPuzzle();
        startTimer();
    }

    function shuffleSlidingPuzzle() {
        // Simple random walks from solved state to ensure solvability
        tiles = [1, 2, 3, 4, 5, 6, 7, 8, 0];
        let emptyIdx = 8;

        for (let i = 0; i < 100; i++) {
            const neighbors = getNeighbors(emptyIdx);
            const randomNeighbor = neighbors[Math.floor(Math.random() * neighbors.length)];
            // Swap
            [tiles[emptyIdx], tiles[randomNeighbor]] = [tiles[randomNeighbor], tiles[emptyIdx]];
            emptyIdx = randomNeighbor;
        }
    }

    function getNeighbors(idx) {
        const neighbors = [];
        const row = Math.floor(idx / 3);
        const col = idx % 3;

        if (row > 0) neighbors.push(idx - 3); // top
        if (row < 2) neighbors.push(idx + 3); // bottom
        if (col > 0) neighbors.push(idx - 1); // left
        if (col < 2) neighbors.push(idx + 1); // right
        return neighbors;
    }

    function renderSlidingPuzzle() {
        slidingGrid.innerHTML = '';
        tiles.forEach((tile, index) => {
            const tileEl = document.createElement('div');
            tileEl.classList.add('sliding-tile');
            if (tile === 0) {
                tileEl.classList.add('empty');
            } else {
                tileEl.innerHTML = `<span class="tile-number">${tile}</span>`;

                const originalRow = Math.floor((tile - 1) / 3);
                const originalCol = (tile - 1) % 3;

                tileEl.style.backgroundImage = `url("assets/Paraverse logo/ParaverseLogo.svg")`;
                tileEl.style.backgroundSize = '300px 300px';
                tileEl.style.backgroundPosition = `${originalCol * 50}% ${originalRow * 50}%`;
            }

            tileEl.addEventListener('click', () => moveTile(index));
            slidingGrid.appendChild(tileEl);
        });
    }

    function moveTile(index) {
        if (!puzzleActive) return;

        const emptyIdx = tiles.indexOf(0);
        if (getNeighbors(emptyIdx).includes(index)) {
            // Swap
            [tiles[emptyIdx], tiles[index]] = [tiles[index], tiles[emptyIdx]];
            moves++;
            movesCountEl.innerText = moves;
            renderSlidingPuzzle();
            checkSlidingWin();
        }
    }

    function checkSlidingWin() {
        const isSolved = tiles.every((val, index) => {
            if (index === 8) return val === 0;
            return val === index + 1;
        });

        if (isSolved) {
            puzzleActive = false;
            clearInterval(timer);
            setTimeout(() => {
                slidingOverlay.classList.remove('active');
                showModal(winnerModal);
                gameStatus.innerText = 'WINNER!';
            }, 500);
        }
    }

    function startTimer() {
        clearInterval(timer);
        secondsLeft = 179;
        updateTimerDisplay();

        timer = setInterval(() => {
            secondsLeft--;
            updateTimerDisplay();

            // Progress bar
            const percent = (secondsLeft / 179) * 100;
            timeProgressEl.style.width = `${percent}%`;

            if (secondsLeft <= 0) {
                clearInterval(timer);
                puzzleActive = false;
                slidingOverlay.classList.remove('active');
                showModal(document.getElementById('game-over-modal'));
            }
        }, 1000);
    }

    function updateTimerDisplay() {
        const m = Math.floor(secondsLeft / 60);
        const s = secondsLeft % 60;
        timeLeftEl.innerText = `0${m}:${s < 10 ? '0' : ''}${s}`;
    }

    // Buttons in sliding puzzle
    document.getElementById('btn-restart').addEventListener('click', () => {
        shuffleSlidingPuzzle();
        renderSlidingPuzzle();
        moves = 0;
        movesCountEl.innerText = moves;
    });

    document.getElementById('btn-giveup').addEventListener('click', () => {
        puzzleActive = false;
        clearInterval(timer);
        slidingOverlay.classList.remove('active');
        showModal(document.getElementById('game-over-modal'));
    });
});
