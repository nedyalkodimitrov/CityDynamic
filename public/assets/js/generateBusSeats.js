function generateSeats(totalSeats, seatsPerRow) {
    var container = document.getElementById('bus-seats');
    var rows = Math.ceil(totalSeats / seatsPerRow);

    // Create a flex container to hold the driver's seat and the seats
    var flexContainer = document.createElement('div');
    flexContainer.style.display = 'flex';
    flexContainer.style.flexDirection = 'column-reverse';
    flexContainer.style.border = '1px solid black';
    container.innerHTML = '';
    container.appendChild(flexContainer);

    // // Create a driver seat at the beginning
    // var driverSeat = document.createElement('div');
    // driverSeat.style.width = '20px';
    // driverSeat.style.height = '20px';
    // driverSeat.style.margin = '2px';
    // driverSeat.style.backgroundColor = 'red'; // Driver seat color
    // flexContainer.appendChild(driverSeat);

    // Create a flex container to hold the rows (now acting as columns)
    var seatsContainer = document.createElement('div');
    seatsContainer.style.display = 'flex';
    flexContainer.appendChild(seatsContainer);

    var seatNumber = 1;

    for (var i = 0; i < rows; i++) {
        var column = document.createElement('div');
        column.style.display = 'flex';
        column.style.flexDirection = 'column';

        var seatsInThisRow = Math.min(seatsPerRow, totalSeats - i * seatsPerRow);

        for (var j = 0; j < seatsInThisRow; j++) {
            var seat = document.createElement('div');
            seat.style.width = '30px';
            seat.style.height = '30px';
            seat.style.margin = '2px';

            seat.style.border = '1px solid black';
            seat.style.textAlign = 'center';
            seat.style.verticalAlign = 'center';


            // Add seat number
            var seatText = document.createTextNode(seatNumber.toString());
            seat.appendChild(seatText);

            column.appendChild(seat);
            seatNumber++;

            // Add a corridor after half the seats in a row
            if (j === Math.floor(seatsPerRow / 2) - 1) {
                var corridor = document.createElement('div');
                corridor.style.width = '20px';
                corridor.style.height = '20px';
                corridor.style.margin = '2px';
                corridor.style.backgroundColor = 'white'; // Corridor color
                column.appendChild(corridor);
            }
        }

        seatsContainer.appendChild(column);
    }
}
