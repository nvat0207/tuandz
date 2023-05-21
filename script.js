var chessboard = document.getElementById("chessboard");

// Tạo bàn cờ
function createChessboard() {
    for (var row = 0; row < 8; row++) {
        for (var col = 0; col < 8; col++) {
            var square = document.createElement("div");
            square.classList.add("square");

            if ((row + col) % 2 === 0) {
                square.classList.add("light");
            } else {
                square.classList.add("dark");
            }

            chessboard.appendChild(square);
        }
    }
}

// Gọi hàm tạo bàn cờ
createChessboard();
