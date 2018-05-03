            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                    	Menu
                    </li>
                    @foreach($categories as $category)
                        @if(count($category->types) >0)
                            <li href="#" class="list-group-item menu1">
                            	{{$category->name}}
                            </li>

                            <ul>
                                @foreach($category->types as $type)
                            		<li class="list-group-item">
                            			<a href="types/{{$type->id}}/{{$type->unsigned_name}}">{{$type->name}}</a>
                            		</li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </ul>
            </div>