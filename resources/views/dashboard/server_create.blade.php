<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            @if (isset($server))
                <h1 class="block-title">{{ $server->name }}</h1>
            @else
                <h1 class="block-title">Добавление нового сервера</h1>
            @endif
        </div>
        <div class="block-content">
            {!! Form::open(["url" => (isset($server->id)) ? route('server.update',['server'=>$server->alias]) : route('server.store'), 'method' => "post", "id" => "serverCreate", "files" => "true"]) !!}
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Название проекта</label>
                    {!! Form::text('name', isset($server->name)? $server->name : old("name"), ['id'=>'title', "class" => "form-control", "required" => "", "placeholder" => "l2oko.ru"]) !!}
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    {!! Form::textarea('description', isset($server->description)? $server->description : old("description"), ['id'=>'description', "class" => "form-control", "required" => ""]) !!}
                </div>
                <div class="form-group">
                    <label for="short_desc">Краткое описание</label>
                    {!! Form::textarea('short_desc', isset($server->short_desc)? $server->short_desc : old("short_desc"), ['id'=>'short_desc', "class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label for="status_id">Статус</label>
                    {!! Form::select('status_id', $inputs["statuses"], isset($server->status_id)? $server->status_id : old("status_id"), ['id'=>'status_id', "class" => "form-control", "required" => ""]) !!}
                </div>
                <div class="form-group">
                    <label for="chronicle_id">Хроники</label>
                    {!! Form::select('chronicle_id', $inputs["chronicles"], isset($server->chronicle_id)? $server->chronicle_id : old("chronicle_id"), ['id'=>'chronicle_id', "class" => "form-control", "required" => ""]) !!}
                </div>
                <div class="form-group">
                    <label for="rate_id">Рейты</label>
                    {!! Form::select('rate_id', $inputs["rates"], isset($server->rate_id)? $server->rate_id : old("rate_id"), ['id'=>'rate_id', "class" => "form-control", "required" => ""]) !!}
                </div>
                <div class="form-group">
                    <label for="start_at">Дата старта</label>
                    {!! Form::text('start_at', isset($server->start_at)? $server->start_at : old("start_at"), ['id'=>'start_at', "class" => "form-control datepicker-here", "required" => "", "data-timepicker" => "true"]) !!}
                </div>
                <div class="form-group">
                    <label for="link">Ссылка на проект</label>
                    {!! Form::url('link', isset($server->link)? $server->link : old("link"), ['id'=>'link', "class" => "form-control", "required" => "", "placeholder" => "http://l2oko.ru"]) !!}
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    {!! Form::email('email', isset($server->email)? $server->email : old("email"), ['id'=>'email', "class" => "form-control", "required" => "", "placeholder" => "info@l2oko.ru"]) !!}
                </div>
                <div class="form-group">
                    <label for="vk">VK</label>
                    {!! Form::url('vk', isset($server->social_vk)? $server->social_vk : old("vk"), ['id'=>'vk', "class" => "form-control", "placeholder" => "https://vk.com/l2oko"]) !!}
                </div>
                <div class="form-group">
                    <label for="fb">Facebook</label>
                    {!! Form::url('fb', isset($server->social_fb)? $server->social_fb : old("fb"), ['id'=>'fb', "class" => "form-control", "placeholder" => "https://www.facebook.com/l2oko/"]) !!}
                </div>
                <div class="form-group">
                    <label for="tw">Twitter</label>
                    {!! Form::url('tw', isset($server->social_tw)? $server->social_tw : old("tw"), ['id'=>'tw', "class" => "form-control", "placeholder" => "https://twitter.com/l2oko/"]) !!}
                </div>
                <div class="form-group">
                    <label for="icq">Icq</label>
                    {!! Form::text('icq', isset($server->social_icq)? $server->social_icq : old("icq"), ['id'=>'icq', "class" => "form-control", "placeholder" => "2346223453"]) !!}
                </div>
                <div class="form-group">
                    <label for="h1">h1</label>
                    {!! Form::text('h1', isset($server->h1)? $server->h1 : old("h1"), ['id'=>'h1', "class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label for="h2">h2</label>
                    {!! Form::text('h2', isset($server->h2)? $server->h2 : old("h2"), ['id'=>'h2', "class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label for="p">p</label>
                    {!! Form::text('p', isset($server->p)? $server->p : old("p"), ['id'=>'p', "class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label for="title">title</label>
                    {!! Form::text('title', isset($server->title)? $server->title : old("title"), ['id'=>'title', "class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <label class="col-12">Изображение для кросспостинга</label>
                        @if(isset($server->picture))
                        <div class="row items-push">
                            <div class="col-md-4 animated fadeIn">
                                <div class="options-container fx-item-zoom-in">
                                    <img class="img-fluid options-item" src="/uploads/servers/server-{{$server->id}}{{$server->picture}}?time={{$server->updated_at->format('d_h_i_s')}}" alt="">
                                    <div class="options-overlay bg-black-op">
                                        <div class="options-overlay-content">
                                            <h3 class="h4 text-white mb-5">{{$server->name}}</h3>
                                            <h4 class="h6 text-white-op mb-15">{{$server->short_desc}}</h4>
                                            <a id="delete-pic" class="btn btn-sm btn-rounded btn-alt-danger min-width-75" href="#">
                                                <i class="fa fa-times"></i> Удалить
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <p>Чтобы заменить изображение загрузите новое</p>
                        @endif
                        <label class="custom-file">
                        {!! Form::file('picture', ['class' => 'custom-file-input']) !!}
                         <span class="custom-file-control"></span>
                        </label>
                </div>
                <div class="form-group">
                @if (isset($server))
                    <input type="hidden" name="_method" value="PUT">
                    {!! Form::button('Сохранить', ['class' => 'btn btn-success','type'=>'submit']) !!}
                @else
                    {!! Form::button('Добавить', ['class' => 'btn btn-success','type'=>'submit']) !!}
                @endif
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>