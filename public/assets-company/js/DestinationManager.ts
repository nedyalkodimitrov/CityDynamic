export class DestinationManager {
    stationCount: number;
    stations: any;
    destinationContainer: any;

    constructor(stations, destinationContainer) {
        this.stationCount = 2;
        this.stations = stations;
        this.destinationContainer = destinationContainer;
    }

    addStation() {
        this.stationCount++;

        let station = document.createElement('div');
        station.className = "col-12 row mx-auto mt-3 p-0 destination";
        station.id = "station-" + this.stationCount;
        station.innerHTML = this.createStation();
        document.querySelector(this.destinationContainer).appendChild(station);
    }

    removeStation() {

    }

    private createStation() {
        let innerHTML = `
        <div class="p-0 col-12 pl-0 mb-0 pb-0" style="display: flex; justify-content: space-between">
            <div style="display: flex; align-items: center; gap: 5px">
                <div class="arrow-right"></div>
                <b><p class="p-0 m-0">№${this.stationCount}</p></b>
            </div>
        </div>
        <div class="pl-2 form-group col-12" style="padding-left: 1.5em;">
            <label for="exampleInputEmail1">Крайна точка</label>
            <select class="form-select" name="station-${this.stationCount}" id="">
                <option value="" disabled selected>Избери автогара</option>`;

        // Add options for each bus station
        this.stations.forEach(function (station) {
            innerHTML += `<option value="${station.id}">${station.name}</option>`;
        });

        innerHTML += `</select><span class="delete-btn" style="cursor: pointer">X</span></div>`;

        // Set the inner HTML of the new station
        return  innerHTML;
    }
}

