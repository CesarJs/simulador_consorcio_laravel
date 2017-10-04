<!-- Modal -->
<div class="modal fade" id="modalProvider" tabindex="-1" role="dialog" aria-labelledby="providerLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Provider</h4>
      </div>
      <div class="modal-body">
        <div>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#createProvider" aria-controls="createProvider" role="tab" data-toggle="tab">Criar</a></li>
            <li role="presentation"><a href="#editProvider" aria-controls="editProvider" role="tab" data-toggle="tab">Alterar</a></li>

          </ul>

          <!-- Tab panes -->
          <div class="tab-content" >
            <div role="tabpanel" class="tab-pane active" id="createProvider" style="padding-top: 1em;">
              {!! Form::open(['route' => 'providers.store','enctype'=>'multipart/form-data','class'=>'form','id'=>"createProvider"]) !!}

              @include('providers._form')

              <div class="form-group col-md-12">
                {!! Form::submit('Criar Provider',['class'=>'btn btn-primary btn-block']) !!}
              </div>




              {!! Form::close() !!}

            </div>
            <div role="tabpanel" class="tab-pane" id="editProvider">
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="row" id="msgError"></div>
                  <div class="table-wrap">
                    <div class="table-responsive">
                      <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Ação</th>
                            
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Nome</th>
                            <th>Ação</th>
                            
                          </tr>
                        </tfoot>
                        <tbody id='tableResultsCat'>
                          <?php foreach($providersAll as $provider){


                            ?>
                            <tr>
                              <td id="provider-{{$provider->id}}">{{$provider->name}}</td>


                              <td>
                                <a href="#" id="btnEditProvider-{{$provider->id}}" class="btn btn-primary btn-small btn-block" onclick="$('#btnEditProvider-{{$provider->id}}').fadeOut();$('#hideProvider-{{$provider->id}}').fadeIn();">
                                  Editar

                                </a>
                                <div class="row" style="display: none;" id="hideProvider-{{$provider->id}}">
                                  <div class="col-md-8">
                                    <input type="text" class="form-control" required placeholder="Novo nome" value="{{$provider->name}}" id="newProvider-{{$provider->id}}"> 
                                    <input type="text" class="form-control" required placeholder="Novo Email" value="{{$provider->email}}" id="newEmailProvider-{{$provider->id}}"> 
                                    <input type="hidden" class="form-control" id="oldProvider-{{$provider->id}}"> 
                                  </div>
                                  <div class="col-md-4">
                                    <button id="btnSaveProvider-{{$provider->id}}" class="btn btn-block btn-success" onClick="saveProvider('{{$provider->id}}');">Salvar</button>
                                  </div>

                                </div>
                              </td>
                            </tr>

                            <?php }
                            ?>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>