{{-- Team Modal --}}
<div class="modal fade" id="editTeam{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Jamoa nomini tahrirlash</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.team.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group ">
                                <label>Sport Kategoriyasiga biriktirish</label>
                                <select name="sport_category_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value="0"> - </option>
                                    @foreach ($sport_categories as $category )
                                        <option value="{{$category->id}}" {{ $category->id == $item->sport_category_id ? 'selected' : '' }} >{{$category->translate('uz')->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group ">
                                <label>Jamoa Nomi</label>
                                <input type="text" class="form-control" placeholder="Nomni kiriting" name="name"  value="{{ $item->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label>Tashkil Topgan Yil</label>
                                <input type="number" class="form-control" placeholder="Yilni kiriting" name="year" value="{{ $item->year }}">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label>Manzili</label>
                                <input type="text" class="form-control" placeholder="Manzilni kiriting" name="address" value="{{ $item->address }}">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label>Jamoa Rasmiy Sayti</label>
                                <input type="text" class="form-control" placeholder="Manzilni kiriting" name="official_site" value="{{ $item->official_site }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group ">
                                <label class="">Rasm</label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Rasm</label>
                                    <input type="file" name="image[]" id="image-upload" multiple/>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group ">
                                <label>Meta Nomi(title)</label>
                                <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_title" value="{{ $item->meta_title }}">
                            </div>
        
                            <div class="form-group ">
                                <label>Meta Nomi(description)</label>
                                <input type="text" class="form-control" placeholder="Meta Tavsifni kiriting" name="meta_description" value="{{ $item->meta_description }}">
                            </div>
        
                            <div class="form-group ">
                                <label>Meta kalitso'z (keywords)</label>
                                <input type="text" class="form-control" placeholder="Meta Kalitso'zni kiriting" name="meta_keywords" value="{{ $item->meta_keywords }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            @if (!empty($item->image))
                                <img src="/admin/images/teams/{{$item->image}}" width="100%">
                            @else 
                                <h5 class="text-danger"> {{ __("Rasm mavjud emas!") }} </h5>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect"> {{ __("Saqlash") }} </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
