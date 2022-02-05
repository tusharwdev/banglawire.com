<div>
    @foreach($items as $item)
      @if($item->type == 'divider')
        <li class="app-sidebar__heading">
            {{ $item->divider_title }}
        </li>
        @else
          @if($item->childs->isEmpty())
              <li>
                  <a href="{{ $item->url }}"
                     class="{{\Illuminate\Support\Facades\Request::is(ltrim($item->url,'/').'*') ? 'mm-active' : ''}}"
                  >
                      <i class="{{ $item->icon_class }}"></i>
                      <span>{{ $item->title }}</span>
                  </a>
              </li>
            @else
                <li
                @foreach($item->childs as $child)
                   @if(\Illuminate\Support\Facades\Request::is(ltrim($child->url,'/').'*'))
                       class="mm-active"
               @break
                   @endif
               @endforeach
                >
                    <a href="{{ $item->url }}"
                       class="{{\Illuminate\Support\Facades\Request::is(ltrim($item->url,'/').'*') ? 'mm-active' : ''}}"
                    >
                        <i class="{{ $item->icon_class }}"></i>
                        <span>{{ $item->title }}</span>
                        <i class="metismenu-state-icon pe-7s-angle-down fa-caret-left"></i>
                    </a>
                    <ul>
                        @foreach($item->childs as $child)
                            <li>
                                <a href="{{ $child->url }}"
                                   class="{{\Illuminate\Support\Facades\Request::is(ltrim($child->url,'/').'*') ? 'mm-active' : ''}}"
                                >
                                    <i class="{{ $child->icon_class }}"></i>
                                    <span>{{ $child->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
          @endif
        @endif
    @endforeach

</div>
