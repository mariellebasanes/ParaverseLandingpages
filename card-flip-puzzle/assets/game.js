// Card Flip Puzzle Game Controller

const cardDatabase = [
  { emoji: '🦁', type: 'Question!', text: 'Sino ang unang pangulo ng Pilipinas?', answer: 'Emilio Aguinaldo' },
  { emoji: '🌸', type: 'Trivia!', text: 'Ano ang pambansang bulaklak ng Pilipinas?', answer: 'Sampaguita' },
  { emoji: '🦅', type: 'Trivia!', text: 'Ano ang pambansang ibon ng Pilipinas?', answer: 'Philippine Eagle' },
  { emoji: '🥭', type: 'Question!', text: 'Ano ang pambansang prutas ng Pilipinas?', answer: 'Mangga' },
  { emoji: '🏠', type: 'Trivia!', text: 'Ano ang pambansang bahay ng Pilipinas?', answer: 'Bahay Kubo' },
  { emoji: '🐟', type: 'Question!', text: 'Ano ang pambansang isda ng Pilipinas?', answer: 'Bangus' },
  { emoji: '🌳', type: 'Trivia!', text: 'Ano ang pambansang puno ng Pilipinas?', answer: 'Narra' },
  { emoji: '⚽', type: 'Question!', text: 'Ano ang pambansang laro ng Pilipinas?', answer: 'Arnis' },
  { emoji: '🏛️', type: 'Trivia!', text: 'Ano ang itinatag na taon ng FEU Tech?', answer: '1992' },
  { emoji: '🎓', type: 'Question!', text: 'Sino ang founder ng FEU?', answer: 'Nicanor Reyes' },
  { emoji: '💻', type: 'Trivia!', text: 'Ano ang pinakabagong computer lab sa FEU Alabang?', answer: 'Mac Lab' },
  { emoji: '🎮', type: 'Question!', text: 'Anong virtual world ang binuo ng EITH?', answer: 'Paraverse' }
];

class CardFlipGame {
  constructor() {
    this.gridSize = 5; // Default 5x5
    this.cards = [];
    this.flippedCards = [];
    this.matchedPairs = 0;
    this.movesCount = 0;
    this.timeLeft = 180; // 3 minutes in seconds
    this.timerInterval = null;
    this.isPlaying = false;
    
    // Sliding Puzzle variables
    this.puzzleGrid = [1, 2, 3, 4, 5, 6, 7, 8, null];
    this.puzzleMoves = 0;
    this.puzzleSolved = false;
    
    this.initDOM();
  }
  
  initDOM() {
    // Bind click handlers to grid buttons
    const btn3 = document.querySelector('.container4 .button');
    const btn4 = document.querySelector('.container4 .button2');
    const btn5 = document.querySelector('.container4 .button3');
    
    if (btn3) btn3.addEventListener('click', () => this.changeGridSize(3, btn3));
    if (btn4) btn4.addEventListener('click', () => this.changeGridSize(4, btn4));
    if (btn5) btn5.addEventListener('click', () => this.changeGridSize(5, btn5));
    
    // Set 5x5 active initially
    if (btn5) btn5.classList.add('active');
    
    // Initialize first game
    this.resetGame();
  }
  
  changeGridSize(size, clickedBtn) {
    // Toggle active classes on buttons
    document.querySelectorAll('.container4 > div').forEach(btn => btn.classList.remove('active'));
    if (clickedBtn) clickedBtn.classList.add('active');
    
    this.gridSize = size;
    this.resetGame();
  }
  
  resetGame() {
    clearInterval(this.timerInterval);
    this.flippedCards = [];
    this.matchedPairs = 0;
    this.movesCount = 0;
    this.timeLeft = 180; // 3 minutes
    this.isPlaying = true;
    
    // Update Stats in UI
    const sizeStr = `${this.gridSize} × ${this.gridSize}`;
    const totalCards = this.gridSize * this.gridSize;
    
    const sizeElem = document.getElementById('stat-grid-size');
    const totalElem = document.getElementById('stat-total-cards');
    const statusElem = document.getElementById('stat-status');
    const descElem = document.querySelector('._25-cards-advanced');
    
    if (sizeElem) sizeElem.textContent = sizeStr;
    if (totalElem) totalElem.textContent = totalCards;
    if (statusElem) statusElem.textContent = 'FACE DOWN';
    if (descElem) {
      if (this.gridSize === 3) descElem.textContent = '9 cards · BEGINNER';
      else if (this.gridSize === 4) descElem.textContent = '16 cards · INTERMEDIATE';
      else descElem.textContent = '25 cards · ADVANCED';
    }
    
    // Generate Cards Layout
    this.generateCards();
    
    // Start Timer
    this.startTimer();
  }
  
  startTimer() {
    const statusElem = document.getElementById('stat-status');
    this.timerInterval = setInterval(() => {
      this.timeLeft--;
      if (this.timeLeft <= 0) {
        clearInterval(this.timerInterval);
        this.isPlaying = false;
        this.showLoseModal('TIMEOUT! Sunog ang oras mo.');
      } else {
        const mins = Math.floor(this.timeLeft / 60);
        const secs = this.timeLeft % 60;
        const timeStr = `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
        if (statusElem) statusElem.textContent = `PLAYING (${timeStr})`;
      }
    }, 1000);
  }
  
  generateCards() {
    const totalCards = this.gridSize * this.gridSize;
    const pairsCount = Math.floor(totalCards / 2);
    
    // Get random items from db
    const shuffledDb = [...cardDatabase].sort(() => 0.5 - Math.random());
    const selectedItems = shuffledDb.slice(0, pairsCount);
    
    // Create pairs
    let gameItems = [];
    selectedItems.forEach(item => {
      gameItems.push({ ...item, id: Math.random() });
      gameItems.push({ ...item, id: Math.random() });
    });
    
    // If odd size, add a BOMB
    if (totalCards % 2 !== 0) {
      gameItems.push({
        emoji: '💣',
        type: 'BOOM!',
        text: 'HALA!! Ay sus, bokya ka! Nakuha mo ang bomba.',
        answer: 'BOMB',
        isBomb: true,
        id: Math.random()
      });
    }
    
    // Shuffle final set
    gameItems.sort(() => 0.5 - Math.random());
    this.cards = gameItems;
    
    // Render Board
    const gridContainer = document.getElementById('game-grid');
    if (!gridContainer) return;
    
    // Update grid container class for layout styles
    gridContainer.className = `_${this.gridSize}-x-${this.gridSize}-landscape`;
    gridContainer.innerHTML = '';
    
    this.cards.forEach((item, index) => {
      const cardDiv = document.createElement('div');
      cardDiv.className = `cards`;
      cardDiv.style.position = 'relative';
      cardDiv.style.height = this.gridSize === 4 ? '167px' : '170px';
      cardDiv.style.width = '238px';
      
      // Inject standard markup
      cardDiv.innerHTML = `
        <!-- Card Back -->
        <div class="card-back">
          <div class="container7"></div>
          <div class="container8"></div>
          <div class="container9"></div>
          <div class="container10"></div>
          <div class="container11"></div>
          <div class="container12"></div>
          <div class="container13">
            <img class="paraverse-logo2" src="assets/paraverse-logo1.svg" />
          </div>
          <div class="container14">
            <div class="container15">
              <div class="paraverse2">PARAVERSE</div>
            </div>
            <div class="container16">
              <div class="div">??????</div>
            </div>
          </div>
        </div>
        <!-- Card Front Wrapper -->
        <div class="revealed-cards-5-x-5-puzzle-card-game-design" style="display: contents;">
          <div class="card-front">
            <div class="container17"></div>
            <div class="container18">
              <div class="frame-1">
                <div class="div2">${item.emoji}</div>
                <div class="container19">
                  <div class="question">${item.type}</div>
                </div>
                <div class="sino-ang-unang-pangulo-ng-pilipinas">
                  ${item.text}
                </div>
              </div>
            </div>
          </div>
        </div>
      `;
      
      cardDiv.addEventListener('click', () => this.handleCardFlip(index, cardDiv));
      gridContainer.appendChild(cardDiv);
    });
  }
  
  handleCardFlip(index, cardDiv) {
    if (!this.isPlaying) return;
    if (cardDiv.classList.contains('flipped') || cardDiv.classList.contains('matched')) return;
    
    const cardData = this.cards[index];
    
    // Check if BOMB (needs to flip first, then show lose modal)
    if (cardData.isBomb) {
      cardDiv.classList.add('flipped');
      clearInterval(this.timerInterval);
      this.isPlaying = false;
      setTimeout(() => {
        this.showLoseModal();
      }, 800);
      return;
    }
    
    // If first card
    if (this.flippedCards.length === 0) {
      cardDiv.classList.add('flipped');
      this.flippedCards.push({ index, data: cardData, element: cardDiv });
      return;
    }
    
    // If second card
    if (this.flippedCards.length === 1) {
      const card1 = this.flippedCards[0];
      const card2 = { index, data: cardData, element: cardDiv };
      
      if (card1.data.emoji === card2.data.emoji) {
        // MATCH!
        const winThreshold = Math.floor((this.gridSize * this.gridSize) / 2);
        
        if (this.matchedPairs + 1 === winThreshold) {
          // FINAL CORRECT CARD!
          // Before flipping card2, show sliding puzzle
          this.finalCardReveal = { card1, card2 };
          clearInterval(this.timerInterval);
          this.isPlaying = false;
          
          setTimeout(() => {
            this.startSlidingPuzzlePhase();
          }, 600);
        } else {
          // Regular match: flip and match normally
          cardDiv.classList.add('flipped');
          card1.element.classList.add('matched');
          card2.element.classList.add('matched');
          this.matchedPairs++;
          this.flippedCards = [];
          this.movesCount++;
          
          setTimeout(() => {
            this.showTriviaModal(card1.data);
          }, 600);
        }
      } else {
        // NO MATCH: flip card2, show it, then flip both back
        cardDiv.classList.add('flipped');
        this.movesCount++;
        this.isPlaying = false; // Block inputs during delay
        setTimeout(() => {
          card1.element.classList.remove('flipped');
          card2.element.classList.remove('flipped');
          this.flippedCards = [];
          this.isPlaying = true;
        }, 1000);
      }
    }
  }
  
  showTriviaModal(item) {
    const wrapper = document.getElementById('trivia-modal-wrapper');
    if (!wrapper) return;
    
    // Populate trivia data
    const emojiElem = wrapper.querySelector('.div2');
    const typeElem = wrapper.querySelector('.trivia');
    const textElem = wrapper.querySelector('.ano-ang-pambansang-bulaklak-ng-pilipinas');
    
    if (emojiElem) emojiElem.textContent = item.emoji;
    if (typeElem) typeElem.textContent = item.type;
    if (textElem) textElem.textContent = item.text;
    
    // Add interactive input field for validation
    let interactionContainer = wrapper.querySelector('#trivia-interaction');
    if (!interactionContainer) {
      interactionContainer = document.createElement('div');
      interactionContainer.id = 'trivia-interaction';
      interactionContainer.style.textAlign = 'center';
      interactionContainer.style.marginTop = '20px';
      interactionContainer.style.position = 'absolute';
      interactionContainer.style.width = '100%';
      interactionContainer.style.top = '320px';
      
      const input = document.createElement('input');
      input.type = 'text';
      input.id = 'trivia-input';
      input.placeholder = 'Type your answer...';
      input.style.padding = '10px';
      input.style.borderRadius = '8px';
      input.style.border = '1px solid rgba(99, 102, 241, 0.5)';
      input.style.background = '#060d25';
      input.style.color = '#fff';
      input.style.textAlign = 'center';
      input.style.width = '240px';
      
      const verifyBtn = document.createElement('button');
      verifyBtn.textContent = 'VERIFY';
      verifyBtn.style.marginLeft = '10px';
      verifyBtn.style.padding = '10px 20px';
      verifyBtn.style.borderRadius = '8px';
      verifyBtn.style.border = 'none';
      verifyBtn.style.background = '#818cf8';
      verifyBtn.style.color = '#fff';
      verifyBtn.style.fontWeight = 'bold';
      verifyBtn.style.cursor = 'pointer';
      
      const feedback = document.createElement('div');
      feedback.id = 'trivia-feedback';
      feedback.style.marginTop = '10px';
      feedback.style.fontSize = '14px';
      feedback.style.fontWeight = 'bold';
      
      interactionContainer.appendChild(input);
      interactionContainer.appendChild(verifyBtn);
      interactionContainer.appendChild(feedback);
      
      const contentCard = wrapper.querySelector('.container18');
      if (contentCard) contentCard.appendChild(interactionContainer);
    }
    
    // Reset inputs
    const input = interactionContainer.querySelector('#trivia-input');
    const feedback = interactionContainer.querySelector('#trivia-feedback');
    if (input) {
      input.value = '';
      input.style.borderColor = 'rgba(99, 102, 241, 0.5)';
    }
    if (feedback) feedback.textContent = '';
    
    // Verify action
    const verifyBtn = interactionContainer.querySelector('button');
    const checkAnswer = () => {
      const userAns = input.value.trim().toLowerCase();
      const correctAns = item.answer.trim().toLowerCase();
      if (userAns === correctAns) {
        feedback.textContent = 'CORRECT! 🎉';
        feedback.style.color = '#10b981';
        input.style.borderColor = '#10b981';
        setTimeout(() => {
          wrapper.style.display = 'none';
          const winThreshold = Math.floor((this.gridSize * this.gridSize) / 2);
          if (this.matchedPairs === winThreshold) {
            this.showCongratulationsModal();
          }
        }, 1200);
      } else {
        feedback.textContent = 'Incorrect, try again! ❌';
        feedback.style.color = '#ef4444';
        input.style.borderColor = '#ef4444';
      }
    };
    
    verifyBtn.onclick = checkAnswer;
    input.onkeypress = (e) => { if (e.key === 'Enter') checkAnswer(); };
    
    // Close button
    const closeBtn = wrapper.querySelector('.button4');
    if (closeBtn) {
      closeBtn.onclick = () => {
        wrapper.style.display = 'none';
        const winThreshold = Math.floor((this.gridSize * this.gridSize) / 2);
        if (this.matchedPairs === winThreshold) {
          this.showCongratulationsModal();
        }
      };
    }
    
    wrapper.style.display = 'flex';
  }
  
  showLoseModal(customMsg) {
    const wrapper = document.getElementById('lose-modal-wrapper');
    if (!wrapper) return;
    
    if (customMsg) {
      const msgElem = wrapper.querySelector('.ay-sus-bokya-ka');
      if (msgElem) msgElem.textContent = customMsg;
    }
    
    const closeBtn = wrapper.querySelector('.button4');
    if (closeBtn) {
      closeBtn.onclick = () => {
        wrapper.style.display = 'none';
        this.resetGame();
      };
    }
    
    wrapper.style.display = 'flex';
  }
  
  startSlidingPuzzlePhase() {
    const wrapper = document.getElementById('puzzle-modal-wrapper');
    if (!wrapper) return;
    
    this.puzzleMoves = 0;
    this.puzzleSolved = false;
    this.puzzleGrid = [1, 2, 3, 4, 5, 6, 7, 8, null];
    
    // Shuffle the puzzle by making random valid moves
    this.shuffleSlidingPuzzle();
    
    // Draw sliding puzzle grid
    this.drawSlidingPuzzle();
    
    // Set up moves display
    const movesElem = wrapper.querySelector('._181');
    if (movesElem) movesElem.textContent = '0';
    
    // Set up timer (2:58 countdown style or similar)
    const timerElem = wrapper.querySelector('._02-58');
    let timeLeft = 178; // 2m 58s
    if (timerElem) timerElem.textContent = '02:58';
    
    const puzzleTimer = setInterval(() => {
      if (this.puzzleSolved) {
        clearInterval(puzzleTimer);
        return;
      }
      timeLeft--;
      if (timeLeft <= 0) {
        clearInterval(puzzleTimer);
        wrapper.style.display = 'none';
        this.showLoseModal('Naupusan ka ng oras sa sliding puzzle!');
      } else {
        const mins = Math.floor(timeLeft / 60);
        const secs = timeLeft % 60;
        if (timerElem) timerElem.textContent = `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
      }
    }, 1000);
    
    // Initially hide the solved congratulations message in sliding puzzle modal
    const solvedBanner = wrapper.querySelector('.container124');
    if (solvedBanner) solvedBanner.style.display = 'none';
    
    // Initially hide the congratulations popup
    const revealBtnWrapper = wrapper.querySelector('.container125');
    if (revealBtnWrapper) {
      revealBtnWrapper.style.display = 'none';
      const revealBtn = revealBtnWrapper.querySelector('.button4');
      if (revealBtn) {
        revealBtn.onclick = () => {
          wrapper.style.display = 'none';
          if (this.finalCardReveal) {
            const { card1, card2 } = this.finalCardReveal;
            card2.element.classList.add('flipped');
            setTimeout(() => {
              card1.element.classList.add('matched');
              card2.element.classList.add('matched');
              this.matchedPairs++;
              this.flippedCards = [];
              this.showTriviaModal(card1.data);
            }, 600);
          } else {
            this.showCongratulationsModal();
          }
        };
      }
    }
    
    wrapper.style.display = 'flex';
  }
  
  shuffleSlidingPuzzle() {
    // Make 100 random valid moves
    for (let i = 0; i < 100; i++) {
      const emptyIdx = this.puzzleGrid.indexOf(null);
      const validIndices = [];
      const row = Math.floor(emptyIdx / 3);
      const col = emptyIdx % 3;
      
      if (row > 0) validIndices.push(emptyIdx - 3); // Up
      if (row < 2) validIndices.push(emptyIdx + 3); // Down
      if (col > 0) validIndices.push(emptyIdx - 1); // Left
      if (col < 2) validIndices.push(emptyIdx + 1); // Right
      
      // Swap empty space with a random valid neighbor
      const randomNeighbor = validIndices[Math.floor(Math.random() * validIndices.length)];
      this.puzzleGrid[emptyIdx] = this.puzzleGrid[randomNeighbor];
      this.puzzleGrid[randomNeighbor] = null;
    }
  }
  
  drawSlidingPuzzle() {
    const wrapper = document.getElementById('puzzle-modal-wrapper');
    const container = wrapper.querySelector('.container90');
    if (!container) return;
    
    // Clear out container contents but keep container dimensions
    container.innerHTML = '';
    
    // Create elements for tiles 1 to 8, plus empty space
    for (let t = 1; t <= 8; t++) {
      const tileDiv = document.createElement('div');
      tileDiv.className = `container${90 + (t === 1 ? 1 : t === 2 ? 6 : t === 3 ? 8 : t === 4 ? 100 : t === 5 ? 102 : t === 6 ? 104 : t === 7 ? 106 : 108)}`;
      tileDiv.style.background = '#0a061e';
      tileDiv.style.borderRadius = '10px';
      tileDiv.style.display = 'flex';
      tileDiv.style.flexDirection = 'column';
      tileDiv.style.alignItems = 'flex-start';
      tileDiv.style.justifyContent = 'flex-start';
      tileDiv.style.width = '96px';
      tileDiv.style.height = '96px';
      tileDiv.style.position = 'absolute';
      tileDiv.style.overflow = 'hidden';
      tileDiv.style.cursor = 'pointer';
      
      // Inner Figma elements
      tileDiv.innerHTML = `
        <div class="container92" style="width:100%; height:100%;">
          <div class="container-transform" style="width:100%; height:100%;">
            <div class="container${91 + (t-1)*2}" style="width:100%; height:100%; position:relative;">
              <div class="container94" style="width:100%; height:100%;">
                <div class="container95" style="width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                  <img class="icon${t === 1 ? '' : t}" src="assets/icon${t - 1}.svg" style="width:80%; height:80%;" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text${t === 1 ? 2 : t === 2 ? 3 : t === 3 ? 4 : t === 4 ? 5 : t === 5 ? 6 : t === 6 ? 7 : t === 7 ? 8 : 9}" style="position:absolute; bottom:5px; right:10px; font-weight:bold; color:rgba(255,255,255,0.4); font-size:12px;">
          <div class="_${t}">${t}</div>
        </div>
      `;
      
      tileDiv.addEventListener('click', () => this.handleTileClick(t));
      container.appendChild(tileDiv);
    }
    
    // Empty space div (optional visual container110)
    const emptyDiv = document.createElement('div');
    emptyDiv.className = 'container110';
    emptyDiv.style.width = '96px';
    emptyDiv.style.height = '96px';
    emptyDiv.style.position = 'absolute';
    container.appendChild(emptyDiv);
    
    // Position tiles initially
    this.updateTilePositions();
  }
  
  updateTilePositions() {
    const wrapper = document.getElementById('puzzle-modal-wrapper');
    const container = wrapper.querySelector('.container90');
    if (!container) return;
    
    for (let t = 1; t <= 8; t++) {
      const tileIdx = this.puzzleGrid.indexOf(t);
      const row = Math.floor(tileIdx / 3);
      const col = tileIdx % 3;
      
      // Find element for this tile
      // It is the (t - 1)th child in container
      const tileElem = container.children[t - 1];
      if (tileElem) {
        tileElem.style.left = `${col * 102}px`;
        tileElem.style.top = `${row * 102}px`;
        tileElem.style.transition = 'all 0.2s cubic-bezier(0.4, 0, 0.2, 1)';
      }
    }
    
    // Empty tile
    const emptyIdx = this.puzzleGrid.indexOf(null);
    const eRow = Math.floor(emptyIdx / 3);
    const eCol = emptyIdx % 3;
    const emptyElem = container.children[8];
    if (emptyElem) {
      emptyElem.style.left = `${eCol * 102}px`;
      emptyElem.style.top = `${eRow * 102}px`;
    }
  }
  
  handleTileClick(tileNumber) {
    if (this.puzzleSolved) return;
    
    const tileIdx = this.puzzleGrid.indexOf(tileNumber);
    const emptyIdx = this.puzzleGrid.indexOf(null);
    
    const tRow = Math.floor(tileIdx / 3);
    const tCol = tileIdx % 3;
    const eRow = Math.floor(emptyIdx / 3);
    const eCol = emptyIdx % 3;
    
    // Check adjacency
    const isAdjacent = (Math.abs(tRow - eRow) === 1 && tCol === eCol) || 
                       (Math.abs(tCol - eCol) === 1 && tRow === eRow);
                       
    if (isAdjacent) {
      // Swap in grid array
      this.puzzleGrid[emptyIdx] = tileNumber;
      this.puzzleGrid[tileIdx] = null;
      
      this.puzzleMoves++;
      
      // Update UI moves counter
      const wrapper = document.getElementById('puzzle-modal-wrapper');
      const movesElem = wrapper.querySelector('._181');
      if (movesElem) movesElem.textContent = this.puzzleMoves;
      
      // Redraw / Slide tiles
      this.updateTilePositions();
      
      // Check win
      this.checkPuzzleWin();
    }
  }
  
  checkPuzzleWin() {
    const isSolved = this.puzzleGrid.every((val, idx) => {
      if (idx === 8) return val === null;
      return val === (idx + 1);
    });
    
    if (isSolved) {
      this.puzzleSolved = true;
      
      // Show celebration in Sliding Puzzle modal
      const wrapper = document.getElementById('puzzle-modal-wrapper');
      const solvedBanner = wrapper.querySelector('.container124');
      const movesText = wrapper.querySelector('.solved-in-181-moves');
      if (movesText) movesText.textContent = `🎉 Solved in ${this.puzzleMoves} moves!`;
      if (solvedBanner) solvedBanner.style.display = 'flex';
      
      const revealBtnWrapper = wrapper.querySelector('.container125');
      if (revealBtnWrapper) revealBtnWrapper.style.display = 'flex';
    }
  }
  
  cheatMatchAll() {
    // Leave the last pair unflipped to trigger the real final reveal flow
    const nonBombCards = [];
    this.cards.forEach((item, index) => {
      if (!item.isBomb) {
        nonBombCards.push({ item, index });
      }
    });
    
    // Group into pairs
    const pairs = {};
    nonBombCards.forEach(c => {
      if (!pairs[c.item.emoji]) pairs[c.item.emoji] = [];
      pairs[c.item.emoji].push(c);
    });
    
    const pairKeys = Object.keys(pairs);
    const lastPairKey = pairKeys[pairKeys.length - 1];
    
    // Match all pairs except the last one
    let matchedCount = 0;
    pairKeys.forEach(key => {
      if (key !== lastPairKey) {
        pairs[key].forEach(c => {
          const cardDiv = document.getElementById('game-grid').children[c.index];
          if (cardDiv) {
            cardDiv.classList.add('flipped', 'matched');
          }
        });
        matchedCount++;
      }
    });
    
    this.matchedPairs = matchedCount;
    
    // Flip first card of last pair
    const lastPair = pairs[lastPairKey];
    const cardDiv1 = document.getElementById('game-grid').children[lastPair[0].index];
    cardDiv1.classList.add('flipped');
    this.flippedCards = [{
      index: lastPair[0].index,
      data: lastPair[0].item,
      element: cardDiv1
    }];
    
    console.log("Cheated match: Flip the remaining card (emoji: " + lastPair[1].item.emoji + ") to trigger sliding puzzle!");
  }
  
  cheatSolvePuzzle() {
    this.puzzleGrid = [1, 2, 3, 4, 5, 6, 7, 8, null];
    this.updateTilePositions();
    this.checkPuzzleWin();
  }

  showCongratulationsModal() {
    const wrapper = document.getElementById('congratulations-modal-wrapper');
    if (!wrapper) return;
    
    const playAgainBtn = wrapper.querySelector('.play-again');
    if (playAgainBtn) {
      playAgainBtn.onclick = () => {
        wrapper.style.display = 'none';
        this.resetGame();
      };
    }
    
    const closeBtn = wrapper.querySelector('.close');
    if (closeBtn) {
      closeBtn.onclick = () => {
        wrapper.style.display = 'none';
      };
    }
    
    wrapper.style.display = 'flex';
  }
}

// Instantiate on load
window.addEventListener('DOMContentLoaded', () => {
  window.game = new CardFlipGame();
});
