<style>
        body {
            background-color: #121212;
            color: #00ff00;
        }
        .leaderboard {
            background: #1a1a1a;
            border: 1px solid #00ff00;
            border-radius: 12px;
            padding: 20px;
        }
        .leaderboard h2 {
            color: #00ff00;
        }
        .leaderboard-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #1a1a1a;
            border: 1px solid #00ff00;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
        }
        .leaderboard-item img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid #00ff00;
        }
        .leaderboard-item .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .leaderboard-item .user-info span {
            font-size: 1.2rem;
        }
        .emoji {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Leaderboard</h2>

        <div class="leaderboard">
            <div class="leaderboard-item">
                <div class="user-info">
                    <img src="https://via.placeholder.com/50" alt="User">
                    <span>John Doe </span>
                </div>
                <div>
                    <strong>1500</strong>
                    <i class="fas fa-trophy text-warning"></i>
                </div>
            </div>

            <div class="leaderboard-item">
                <div class="user-info">
                    <img src="https://via.placeholder.com/50" alt="User">
                    <span>Jane Smith </span>
                </div>
                <div>
                    <strong>1400</strong>
                    <i class="fas fa-trophy text-warning"></i>
                </div>
            </div>

            <div class="leaderboard-item">
                <div class="user-info">
                    <img src="https://via.placeholder.com/50" alt="User">
                    <span>Bob Johnson </span>
                </div>
                <div>
                    <strong>1300</strong>
                    <i class="fas fa-trophy text-warning"></i>
                </div>
            </div>

            <div class="leaderboard-item">
                <div class="user-info">
                    <img src="https://via.placeholder.com/50" alt="User">
                    <span>Alice Cooper </span>
                </div>
                <div>
                    <strong>1200</strong>
                    <i class="fas fa-trophy text-warning"></i>
                </div>
            </div>

            <div class="leaderboard-item">
                <div class="user-info">
                    <img src="https://via.placeholder.com/50" alt="User">
                    <span>Charlie Brown </span>
                </div>
                <div>
                    <strong>1100</strong>
                    <i class="fas fa-trophy text-warning"></i>
                </div>
            </div>
        </div>
    </div>
