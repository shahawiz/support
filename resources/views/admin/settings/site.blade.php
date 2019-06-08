@extends('layouts.app')
@section('title','Admin | Settings')

@section('content')
<div class="container">


    <div class="row">

@include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard <i class="fa fa-chevron-right"></i> Site Setting</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <section class="services py-1 bg-light1 text-center">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-9">
                                    <form>
                                        <div class="form-group row">
                                          <label for="site_name" class="col-4 col-form-label">Website Name</label>
                                          <div class="col-8">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <i class="fa fa-500px"></i>
                                                </div>
                                              </div>
                                              <input id="site_name" name="site_name" placeholder="Help Desk" type="text" aria-describedby="site_nameHelpBlock" required="required" class="form-control">
                                            </div>
                                            <span id="site_nameHelpBlock" class="form-text text-muted">Enter your brand name that would be appear in header and page title.</span>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="site_url" class="col-4 col-form-label">Webiste Domain</label>
                                          <div class="col-8">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <i class="fa fa-link"></i>
                                                </div>
                                              </div>
                                              <input id="site_url" name="site_url" placeholder="yourDomain.com" type="text" class="form-control" required="required">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="site_email" class="col-4 col-form-label">Website Email</label>
                                          <div class="col-8">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <i class="fa fa-envelope-o"></i>
                                                </div>
                                              </div>
                                              <input id="site_email" name="site_email" placeholder="no-reply@yourDomain.com" type="text" aria-describedby="site_emailHelpBlock" required="required" class="form-control">
                                            </div>
                                            <span id="site_emailHelpBlock" class="form-text text-muted">The email will be used in mailling clients with notifications and account activation.</span>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="maintenance" class="col-4 col-form-label">Maintenance Mode</label>
                                          <div class="col-8">
                                            <select id="maintenance" name="maintenance" aria-describedby="maintenanceHelpBlock" class="custom-select" required="required">
                                              <option value="off">Off</option>
                                              <option value="On">On</option>
                                            </select>
                                            <span id="maintenanceHelpBlock" class="form-text text-muted">When you choose On your clients will no longer able to use your website.</span>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="ticketCreate_email" class="col-4 col-form-label">Send Email On New Ticket</label>
                                          <div class="col-8">
                                            <select id="ticketCreate_email" name="ticketCreate_email" required="required" class="custom-select">
                                              <option value="no">No</option>
                                              <option value="yes">Yes</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="ticketReply_email" class="col-4 col-form-label">Send Email on New Reply</label>
                                          <div class="col-8">
                                            <select id="ticketReply_email" name="ticketReply_email" class="custom-select" required="required">
                                              <option value="no">No</option>
                                              <option value="yes">Yes</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="keywords" class="col-4 col-form-label">Keywords</label>
                                          <div class="col-8">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <i class="fa fa-key"></i>
                                                </div>
                                              </div>
                                              <input id="keywords" name="keywords" type="text" class="form-control" aria-describedby="keywordsHelpBlock">
                                            </div>
                                            <span id="keywordsHelpBlock" class="form-text text-muted">Your SEO keywords are the keywords and phrases in your web content that make it possible for people to find your site via search engines.</span>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="description" class="col-4 col-form-label">Description</label>
                                          <div class="col-8">
                                            <textarea id="description" name="description" cols="40" rows="5" class="form-control" aria-describedby="descriptionHelpBlock"></textarea>
                                            <span id="descriptionHelpBlock" class="form-text text-muted">Meta descriptions are intended to provide users with a snippet of what they can expect to find by clicking on your website. Meta descriptions appear beneath a websites URL in search engine results pages.</span>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="copyrights" class="col-4 col-form-label">Copyrights</label>
                                          <div class="col-8">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <i class="fa fa-copyright"></i>
                                                </div>
                                              </div>
                                              <input id="copyrights" name="copyrights" placeholder="Copyright © 2019 SiteName. All Rights Reserved" type="text" class="form-control">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="facebook" class="col-4 col-form-label">Social Accounts</label>
                                          <div class="col-8">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <i class="fa fa-facebook"></i>
                                                </div>
                                              </div>
                                              <input id="facebook" name="facebook" placeholder="https://facebook.com/PageName" type="text" class="form-control">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="twitter" class="col-4 col-form-label"></label>
                                          <div class="col-8">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <i class="fa fa-twitter"></i>
                                                </div>
                                              </div>
                                              <input id="twitter" name="twitter" placeholder="https://twitter.com/AccountID" type="text" class="form-control">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="linkedIn" class="col-4 col-form-label"></label>
                                          <div class="col-8">
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <i class="fa fa-linkedin"></i>
                                                </div>
                                              </div>
                                              <input id="linkedIn" name="linkedIn" placeholder="https://linkedin/in/AccountID" type="text" class="form-control">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <div class="offset-4 col-8">
                                            <button name="submit" type="submit" class="btn btn-primary">Save</button>
                                          </div>
                                        </div>
                                      </form>

                                </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
