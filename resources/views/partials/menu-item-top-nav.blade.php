@if(config('adminlte.layout_topnav') or (isset($item['topnav']) && $item['topnav']))
  @if (isset($item['search']) && $item['search'])
      <form action="{{ $item['href'] }}" method="{{ $item['method'] }}" class="form-inline ml-2 mr-2">
        <div class="input-group">
          <input class="form-control form-control-navbar"  type="search" name="{{ $item['input_name'] }}"  placeholder="{{ $item['text'] }}" aria-label="{{ $item['aria-label'] ?? $item['text'] }}" >
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <div style="border:1px solid red;width:500px;height:50px;position:fixed">252  @php if($_GET[$item['input_name']]{echo "value='".$_GET[$item['input_name']."'"})  @endphp</div>


  @elseif (is_array($item))
      <li class="nav-item {{ $item['top_nav_class'] }}">
          <a class="nav-link @if (isset($item['submenu']))dropdown-item dropdown-toggle @endif" href="{{ $item['href'] }}"
             @if (isset($item['submenu'])) data-toggle="dropdown" @endif
             @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
          >
              <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
  			{{ $item['text'] }}

              @if (isset($item['label']))
                  <span class="badge badge-{{ $item['label_color'] ?? 'primary' }}">{{ $item['label'] }}</span>
              @endif
          </a>
          @if (isset($item['submenu']))
              <ul class="dropdown-menu border-0 shadow">
                  @each('adminlte::partials.menu-item-sub-top-nav', $item['submenu'], 'item')
              </ul>
          @endif
      </li>
  @endif
@endif
