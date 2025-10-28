      <div class="col-md-12">

          <div class="card mb-6">
              <!-- Account -->
              @isset($Settings)
              @foreach ($Settings as $data)
              <div class="card-body pt-4">
                  <form id="" action="{{ route('UpdateGeneralSettings') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $data->id }}">
                      <div class="row g-6">
                          <div class="col-md-6">
                              <label for="CompanyName" class="form-label">Organization Name</label>
                              <input class="form-control" type="text" id="CompanyName" name="CompanyName"
                                  value="{{ $data->CompanyName }}" autofocus />
                          </div>

                          <div class="col-md-6">
                              <label for="email" class="form-label">E-mail</label>
                              <input class="form-control" type="text" id="email" name="Email"
                                  value="{{ $data->Email }}" />
                          </div>

                          <div class="col-md-2">
                              <label class="form-label" for="Code">Code (+123)</label>
                              <div class="input-group input-group-merge">
                                  <input type="text" id="phoneNumber" name="Code" class="form-control"
                                      value="{{ $data->Code }}" />
                              </div>
                          </div>
                          <div class="col-md-2">
                              <label class="form-label" for="phoneNumber">Phone Number</label>
                              <div class="input-group input-group-merge">
                                  {{-- <span class="input-group-text">{{ $data->Code }}</span> --}}
                                  <input type="text" id="phoneNumber" name="Phone" class="form-control"
                                      value="{{ $data->Phone }}" />
                              </div>
                          </div>
                          <div class="col-md-2">
                              <label class="form-label" for="phoneNumber">Phone Number No.2</label>
                              <div class="input-group input-group-merge">
                                  <input type="text" id="phoneNumber" name="Phone2" class="form-control"
                                      value="{{ $data->Phone2 }}" />
                              </div>
                          </div>
                          <div class="col-md-3">
                              <label for="Plot" class="form-label">Plot No.</label>
                              <input type="text" class="form-control" id="Plot" name="Plot" value="{{ $data->Plot }}" />
                          </div>
                          <div class="col-md-3">
                              <label for="Address" class="form-label">Address</label>
                              <input type="text" class="form-control" id="Address" name="Address"
                                  value="{{ $data->Address }}" />
                          </div>


                          <div class="col-md-6">
                              <label class="form-label" for="Country">Country</label>
                              <select id="Country" name="Country" class="select2 form-select">
                                  <option value="{{ $data->Country }}">{{ $data->Country }}</option>

                                  <option value="Sierra Leone">Sierra Leone</option>
                                  <option value="South Africa">South Africa</option>
                                  <option value="Thailand">Thailand</option>
                                  <option value="Turkey">Turkey</option>
                                  <option value="Uganda">Uganda</option>
                                  <option value="Tanzania">Tanzania</option>
                                  <option value="Kenya">Kenya</option>
                                  <option value="United Arab Emirates">United Arab Emirates</option>
                                  <option value="United Kingdom">United Kingdom</option>
                                  <option value="United States">United States</option>
                              </select>
                          </div>


                          <div class="col-md-6">
                              <label for="Currency" class="form-label">Currency</label>
                              <select id="Currency" name="Currency" class="select2 form-select">
                                  <option value="{{ $data->Currency }}">{{ $data->Currency }}</option>
                                  <option value="USD">USD</option>
                                  <option value="Euro">Euro</option>
                                  <option value="Pound">Pound</option>
                                  <option value="SLL">Leones</option>
                                  <option value="UGX">Ug Shillings</option>
                                  <option value="TZX">Tz Shillings</option>
                                  <option value="KSH">Ke Shillings</option>
                              </select>
                          </div>
                      </div>
                      <div class="mt-6">
                          <button type="submit" class="btn btn-primary me-3">Update changes</button>
                          {{-- <button type="resedt" class="btn btn-outline-secondary">Cancel</button> --}}
                      </div>
                  </form>
              </div>
              @endforeach
              @endisset
              <!-- /Account -->
          </div>

      </div>
