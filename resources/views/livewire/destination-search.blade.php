<div>
    <div class="col-12 mx-auto searchBar-container">
        <img src="{{asset("assets/images/road.jpg")}}" alt="" class="image">
        <h1 class="title">Пътуваите из цялата страна</h1>
        <form method="post" action="{{route("user.searchCourses")}}" class="col-11 col-md-10 mx-auto row searchBar">
            @csrf
            <div class="col-6 col-lg-3 ">
                <label>
                    Tръгване
                </label>
                <select class="form-select" id="startCity" name="startCity" wire:model="startCity"
                        wire:change="searchForEndCity">
                    <option value="" disabled selected>Избери град</option>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-lg-3">
                <label>
                    Пристигане
                </label>
                <select class="form-select" id="endCity" name="endCity">
                    <option value="" disabled selected>Избери начален град</option>
                    @foreach($endPoints as $endPoint)
                        <option value="">{{$endPoint->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-lg-3">
                <label>
                    Дата на тръгване
                </label>
                <input type="date" class="form-control" name="travelDate">
            </div>
            <div class="col-12 col-lg-3" style="
    align-self: center;
">
                <button class="btn btn-primary col-12" style="" id="search">Търси <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>
