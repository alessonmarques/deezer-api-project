<form   action="{{ route('front.home.deezer.search.perform') }}"
        method="POST" >
    @csrf
    <div class="row pt-2 px-2 input-group input-group-lg">

        <input  class="form-control form-control-dark w-90 bg-dark text-white"
                id="search_query"
                name="search_query"
                type="text"
                placeholder="Search"
                aria-label="Search"
                value="{{ old('search_query', '' ) }}"
                >

        <button type="submit" class="btn btn-light">
            Search
        </button>
    </div>
</form>
