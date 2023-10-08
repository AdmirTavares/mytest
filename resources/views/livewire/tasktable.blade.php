<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Task Resume</h1>
            <div class="top-right-button-container">
                <div class="btn-group">
                    <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        EXPORT
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start"
                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 43px, 0px);">
                        <a class="dropdown-item" id="dataTablesCopy" href="#">Copy</a>
                        <a class="dropdown-item" id="dataTablesExcel" href="#">Excel</a>
                        <a class="dropdown-item" id="dataTablesCsv" href="#">Csv</a>
                        <a class="dropdown-item" id="dataTablesPdf" href="#">Pdf</a>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
                    role="button" aria-expanded="true" aria-controls="displayOptions">
                    Display Options
                    <i class="simple-icon-arrow-down align-middle"></i>
                </a>
                <div class="collapse dont-collapse-sm" id="displayOptions">
                    <div class="d-block d-md-inline-block">
                        <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                            <input class="form-control" placeholder="Search Table" id="searchDatatable">
                        </div>
                    </div>

                </div>
            </div>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4 data-table-rows data-tables-hide-filter">
            <div id="datatableRows_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="row view-filter">
                    <div class="col-sm-12">
                        <div class="float-left"></div>
                        <div class="float-right">
                            <div id="datatableRows_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control form-control-sm" placeholder=""
                                        aria-controls="datatableRows"></label></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <table style="overflow-x: visibles" id="datatableRows" class="data-table responsive nowrap dataTable no-footer dtr-inline"
                    data-order="[[ 1, &quot;desc&quot; ]]" role="grid" style="width: 1073px;">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="datatableRows" rowspan="1" colspan="1"
                                style="width: 312px;" aria-label="Name: activate to sort column ascending">Answer</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="datatableRows" rowspan="1" colspan="1"
                                style="width: 117px;" aria-sort="descending"
                                aria-label="Sales: activate to sort column ascending">Question</th>
                            <th class="empty sorting" tabindex="0" aria-controls="datatableRows" rowspan="1" colspan="1"
                                style="width: 95px;" aria-label="&amp;nbsp;: activate to sort column ascending">&nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getpacient as $gettask)
                        <tr role="row" class="odd selected">
                            <td >
                                <p class="list-item-heading">{{$gettask->answer}}</p>
                            </td>
                            <td >
                                <p class="list-item-heading">{{$gettask->question}}</p>
                            </td>
                            <td><label
                                    class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-label">&nbsp;</span>
                                </label></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row view-pager">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <div class="dataTables_paginate paging_simple_numbers" id="datatableRows_paginate">
                                <ul class="pagination pagination-sm">
                                    <li class="paginate_button page-item previous disabled" id="datatableRows_previous">
                                        <a href="#" aria-controls="datatableRows" data-dt-idx="0" tabindex="0"
                                            class="page-link prev"><i class="simple-icon-arrow-left"></i></a>
                                    </li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="datatableRows" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="datatableRows"
                                            data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="datatableRows"
                                            data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="datatableRows"
                                            data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item next" id="datatableRows_next"><a href="#"
                                            aria-controls="datatableRows" data-dt-idx="5" tabindex="0"
                                            class="page-link next"><i class="simple-icon-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>