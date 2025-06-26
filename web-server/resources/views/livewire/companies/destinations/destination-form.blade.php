<div>
    <style>
        .arrow-right {
            width: 0;
            height: 0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;
            border-left: 20px solid green;
        }
    </style>
    <form class="col-12 col-md-9 mx-auto col-lg-9 " action="{{is_null($destination) || !$destination->exists ?route("company.createDestination"): route("company.editDestination", ['id' => $destination->id])}}" method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име </label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                   placeholder="Въведете име на дестинацията" value="{{$destination?->name}}">
        </div>
        <div class="col-12 mb-2 m-0 p-0">
            <div class="col-12 col-md-9 mx-auto col-lg-12 mt-3 p-0">
                <div class="m-0 p-0 ">
                    <div class="destinations row" style="border-left: 4px solid green; margin-left: 1em;">
                        @foreach($destinationPoints as $point)
                            <div class="col-12 row mx-auto mt-3 p-0 destination"
                                 id="point-{{$loop->iteration}}">
                                <div class="p-0 col-12 pl-0 mb-0 pb-0"
                                     style="display: flex; justify-content: space-between">
                                    <div style="display: flex; align-items: center; gap: 5px">
                                        <div class="arrow-right"></div>
                                        <b><p class="p-0 m-0">№{{$loop->iteration}}</p></b>
                                    </div>
                                    @if(count($destinationPoints) > 2)
                                        <button type="button" class="btn btn-danger"
                                                wire:click="removePoint({{$loop->index}})"><i class="fa fa-times"></i>
                                        </button>
                                    @endif
                                </div>
                                <div class="pl-2 form-group col-12" style="padding-left: 1.5em;">
                                    <select wire:key="{{$loop->iteration}}" class="form-select" name="stations[{{$loop->iteration}}]" id="select-{{$loop->index}}" wire:model="destinationPoints.{{$loop->index}}.station_id">
                                        <option value="" disabled selected>Избери автогара</option>
                                        @forelse($busStations as $station)
                                            <option value="{{$station->id}}">{{$station->name}}</option>
                                        @empty
                                            <option value="" disabled>Няма станции</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-secondary col-12 mt-3" wire:click="addPoint">Добави точка</button>
        <button type="submit" class="btn btn-primary col-12 mt-3">{{$destination?'Редактирай': 'Създай'}}</button>
    </form>
</div>
