<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="table-responsive {{-- text-nowrap --}}">
            <div class="container">
                <div class="row mb-2">
                    <!-- Includes Table -->
                    <div class="col-md-6 col-12 mb-3">
                        <div class="table-responsive">
                            <table class="table table-sm tableStyle">
                                <tbody class="table-border-bottom-0">
                                    <h3>Logo</h3>
                                    <p>This is the organization's logo</p>
                                    @include('settings.UpdateLogo')
                                    <tr style="background-color: rgba(132, 130, 130, 0.756)">
                                        <td>
                                        <img src="{{ asset($generalSettings->Logo)}}" style="width:100%;height:auto" alt="">
                                    </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Excludes Table -->
                    <div class="col-md-6 col-12 mb-3">
                        <div class="table-responsive">
                            <table class="table table-sm tableStyle">
                                <tbody class="table-border-bottom-0">
                                    <h3>Breadcrumb</h3>
                                    <p>This is the image that appears at the top of each web page</p>
                                    @include('settings.UpdateCrumb')
                                    <tr style="background-color: rgba(132, 130, 130, 0.756)">
                                        <td>
                                        <img src="{{ asset($generalSettings->Crumb)}}" style="width:100%;height:auto" alt="">
                                    </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
