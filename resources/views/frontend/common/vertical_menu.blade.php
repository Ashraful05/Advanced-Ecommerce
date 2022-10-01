@php
 $categories=\App\Models\Category::orderby('category_name_english','asc')->get();
 @endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach($categories as $category)
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>
                        @if(Session::get('language')=='bangla'){{ $category->category_name_bangla }}
                        @else{{ $category->category_name_english }}
                        @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                    $subCategories=\App\Models\SubCategory::where('category_id',$category->id)->orderby('subcategory_name_english','asc')->get();
                                @endphp
                                @foreach($subCategories as $subCategory)
                                    <div class="col-sm-12 col-md-3">
                                        <a href="{{ url('subcategory-product/'.$subCategory->id.'/'.$subCategory->subcategory_slug_english) }}">
                                        <h2 class="title">
                                            @if(Session::get('language')=='english'){{ $subCategory->subcategory_name_english }}
                                            @else {{ $subCategory->subcategory_name_bangla }}
                                            @endif
                                        </h2>
                                        </a>
                                        @php
                                            $subSubCategories = \App\Models\SubSubCategory::where('subcategory_id',$subCategory->id)->get();
                                        @endphp
                                        @foreach($subSubCategories as $subSubCategory)
                                            <ul class="links list-unstyled">
                                                <li><a href="{{ url('subsubcategory-product/'.$subSubCategory->id.'/'.$subSubCategory->subsubcategory_slug_english) }}">
                                                        @if(Session::get('language')=='english'){{ $subSubCategory->subsubcategory_name_english }}
                                                        @else {{ $subSubCategory->subsubcategory_name_bangla }}
                                                        @endif
                                                    </a></li>
                                            </ul>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
            @endforeach
        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
