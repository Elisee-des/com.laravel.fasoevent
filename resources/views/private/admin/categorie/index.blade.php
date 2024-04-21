@extends('private._layouts.app')

@section('titre', 'Gestion des catégories')

@section('contenu')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="me-md-3 me-xl-5">
                            <h2>Gestion des Categories</h2>
                            <p class="mb-md-0">Liste des categories</p>
                        </div>
                        <div class="d-flex">
                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Liste&nbsp;/&nbsp;</p>
                            {{-- <p class="text-primary mb-0 hover-cursor">Analytics</p> --}}
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        {{-- <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                            <i class="mdi mdi-download text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-clock-outline text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-plus text-muted"></i>
                        </button> --}}
                        <button class="btn btn-primary text-white mt-2 mt-xl-0">Ajouter catégorie</button>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="" class="table">
                      <thead>
                        <tr>
                          <th>Noms</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Concert</td>
                          <td>
                              <a class="btn btn-outline-primary mt-xl-0">
                                Editer
                              </a>
                              <a class="btn btn-outline-primary mt-xl-0">
                                  Suppresion
                              </a> 
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
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                    href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a
                    href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a>
                templates</span>
        </div>
    </footer>
    <!-- partial -->
</div>

@endsection