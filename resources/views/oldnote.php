<section class="content">
    <div class="card card-solid">
    @if($layout == 'index')
        @include("professorslist")
    @elseif($layout == 'create')
        <!-- @include("professorslist") -->
        <div class="container-fluid mt-4 " id="create-form">
        <div class="row">
            <section class="col-md-7">
                @include("professorslist")
            </section>
            <section class="col-md-5">

                <div class="card mb-3">
                    <img src="https://marketplace.canva.com/MAB7yqsko0c/1/screen_2x/canva-smart-little-schoolgirl--MAB7yqsko0c.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Enter the informations of the new Professor</h5>
                        <form action="{{ url('/store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Prof_fname</label>
                                <input name="Prof_fname" type="text" class="form-control"  placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label>Prof_lname</label>
                                <input name="Prof_lname" type="text" class="form-control"  placeholder="Enter Last Name">
                            </div>

                            
                            <div class="form-group">
                                <label>Prof_mname</label>
                                <input name="Prof_mname" type="text" class="form-control"  placeholder="Enter Middle Name">
                            </div>
                            
                            <div class="form-group">
                                <label>Subj_ID</label>
                                <input name="Subj_ID" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div>
                            
                            <input type="submit" class="btn btn-info" value="Save">
                            <input type="reset" class="btn btn-warning" value="Reset">
                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
    @elseif($layout == 'show')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include("professorslist")
            </section>
            <section class="col"></section>
        </div>
    </div>
@elseif($layout == 'edit')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-7">
                @include("professorslist")
            </section>
            <section class="col-md-5">

                <div class="card mb-3">
                    <img src="https://marketplace.canva.com/MAB7yqsko0c/1/screen_2x/canva-smart-little-schoolgirl--MAB7yqsko0c.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Update informations of professor</h5>
                        <form action="{{ url('/update/'.$professor->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Prof_fname</label>
                                <input value="{{ $professor->Prof_fname }}" name="Prof_fname" type="text" class="form-control"  placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label>Prof_lname</label>
                                <input value="{{ $professor->Prof_lname }}" name="Prof_lname" type="text" class="form-control"  placeholder="Enter Last Name">
                            </div>

                            
                            <div class="form-group">
                                <label>Prof_mname</label>
                                <input value="{{ $professor->Prof_mname }}" name="Prof_mname" type="text" class="form-control"  placeholder="Enter Middle Name">
                            </div>
                            
                            <div class="form-group">
                                <label>Subj_ID</label>
                                <input value="{{ $professor->Subj_ID }}" name="Subj_ID" type="text" class="form-control"  placeholder="Enter Subject ID">
                            </div>

                            <input type="submit" class="btn btn-info" value="Update">
                            <input type="reset" class="btn btn-warning" value="Reset">

                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
@endif