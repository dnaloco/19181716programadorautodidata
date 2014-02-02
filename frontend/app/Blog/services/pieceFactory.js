blogapp.factory('pieceFactory',
	[function () {
		this.name = null;
		this.game = null;

		var actualPiece, nextPiece, randNum;

		var getPieceByKey (key) {
			return new Piece(key)
		}

		
		
		return {
			send: function (message, to) {
				this.game.send(message, this, to);
			},
			receive: function (message, from) {
				
			},
			getPieces: function () {
				actualPiece = nextPiece;

				randNum = Math.floor(Math.random());

				if (actualPiece === null) {

					actualPiece = getPieceByKey(randNum);
					randNum = Math.floor(Math.random());
				}

				nextPiece = getPieceByKey(randNum);
			},
			movePiece: function () {

			},
			rotatePiece: function () {

			}
		};
	}]);