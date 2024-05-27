function generateSeats(totalSeats, seatsPerRow) {
    let container = document.getElementById('bus-seats');
    let rows = Math.ceil(totalSeats / seatsPerRow);

    let flexContainer = createFlexContainer();
    container.innerHTML = '';
    container.appendChild(flexContainer);

    let seatsContainer = document.createElement('div');
    seatsContainer.style.display = 'flex';
    flexContainer.appendChild(seatsContainer);

    let seatNumber = 1;

    for (let i = 0; i < rows; i++) {
        let column = document.createElement('div');
        column.style.display = 'flex';
        column.style.flexDirection = 'column';

        let seatsInThisRow = Math.min(seatsPerRow, totalSeats - i * seatsPerRow);

        for (let j = 0; j < seatsInThisRow; j++) {
            let seat = createSeat();


            // Add seat number
            let seatText = document.createTextNode(seatNumber.toString());
            seat.appendChild(seatText);

            column.appendChild(seat);
            seatNumber++;

            // Add a corridor after half the seats in a row
            if (j === Math.floor(seatsPerRow / 2) - 1) {

                column.appendChild(createCorridor());
            }
        }

        seatsContainer.appendChild(column);
    }
}

function generateBusSeatsWithStatuses(totalSeats, seatsPerRow, seatStatuses) {
    let container = document.getElementById('bus-seats');
    let rows = Math.ceil(totalSeats / seatsPerRow);

    let flexContainer = createFlexContainer();
    container.innerHTML = '';
    container.appendChild(flexContainer);

    let seatsContainer = document.createElement('div');
    seatsContainer.style.display = 'flex';
    flexContainer.appendChild(seatsContainer);

    let seatNumber = 1;

    for (let i = 0; i < rows; i++) {
        let column = document.createElement('div');
        column.style.display = 'flex';
        column.style.flexDirection = 'column';

        let seatsInThisRow = Math.min(seatsPerRow, totalSeats - i * seatsPerRow);

        for (let j = 0; j < seatsInThisRow; j++) {
            let seat = createSeat();

            // Check the seat status and change the background color accordingly
            if (seatStatuses[seatNumber - 1] === 1) {
                seat.style.backgroundColor = 'red';
            }

            let seatText = document.createTextNode(seatNumber.toString());
            seat.appendChild(seatText);

            column.appendChild(seat);
            seatNumber++;

            if (j === Math.floor(seatsPerRow / 2) - 1) {
                column.appendChild(createCorridor());
            }
        }

        seatsContainer.appendChild(column);
    }
}


function createCorridor() {
    let corridor = document.createElement('div');
    corridor.style.width = '20px';
    corridor.style.height = '20px';
    corridor.style.margin = '2px';
    corridor.style.backgroundColor = 'white';
    return corridor;
}

function createSeat() {
    let seat = document.createElement('div');
    seat.style.width = '30px';
    seat.style.height = '30px';
    seat.style.margin = '2px';
    seat.style.border = '1px solid black';
    seat.style.textAlign = 'center';
    seat.style.verticalAlign = 'center';
    return seat;
}

function createFlexContainer() {
    let flexContainer = document.createElement('div');
    flexContainer.style.display = 'flex';
    flexContainer.style.flexDirection = 'column-reverse';
    flexContainer.style.border = '1px solid black';
    return flexContainer;
}
