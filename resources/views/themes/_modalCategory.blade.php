<!-- Modal -->
<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="caterogyModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Categorias</h4>
      </div>
      <div class="modal-body">
        <div>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#create" aria-controls="create" role="tab" data-toggle="tab">Criar</a></li>
            <li role="presentation"><a href="#edit" aria-controls="edit" role="tab" data-toggle="tab">Alterar</a></li>

          </ul>

          <!-- Tab panes -->
          <div class="tab-content" >
            <div role="tabpanel" class="tab-pane active" id="create" style="padding-top: 1em;">
              {!! Form::open(['route' => 'categories.store','enctype'=>'multipart/form-data','class'=>'form','id'=>"alterCategory"]) !!}

              @include('categories._form')

              <div class="form-group col-md-4">
                {!! Form::submit('Criar Categoria',['class'=>'btn btn-primary btn-block']) !!}
              </div>




              {!! Form::close() !!}

            </div>
            <div role="tabpanel" class="tab-pane" id="edit">
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
                          <?php foreach($categoriesAll as $category){


                            ?>
                            <tr>
                              <td id="category-{{$category->id}}">{{$category->name}}</td>


                              <td>
                                <a href="#" id="btnEdit-{{$category->id}}" class="btn btn-primary btn-small btn-block" onclick="$('#btnEdit-{{$category->id}}').fadeOut();$('#hide-{{$category->id}}').fadeIn();">
                                  Editar

                                </a>
                                <div class="row" style="display: none;" id="hide-{{$category->id}}">
                                  <div class="col-md-8">
                                    <input type="text" class="form-control" required placeholder="Novo nome" id="new-{{$category->id}}"> 
                                    <input type="hidden" class="form-control" id="old-{{$category->id}}"> 
                                  </div>
                                  <div class="col-md-4">
                                    <button id="btnSave-{{$category->id}}" class="btn btn-block btn-success" onClick="saveCategory('{{$category->id}}');">Salvar</button>
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