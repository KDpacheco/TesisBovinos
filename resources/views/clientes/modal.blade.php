<div class="modal fade text-left" id="exampleModalCenter2-{{ $cliente->cedula }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Editar Cliente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            {{ Form::Open(array('action'=>array('ClienteController@update',$cliente->cedula),'method'=>'PATCH')) }}
                            {{ Form::token() }}
                            <div class="modal-body">
                                @if (count($errors)>0)

                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error )
                                        <li>
                                            {{ $error }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="doctorid">Cedula</label>
                                        <input type="text" class="form-control" name="cedula" value="{{ old('cedula', $cliente->cedula) }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="doctorname">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre',$cliente->nombre) }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="doctordegree">teléfono (opcional)</label>
                                        <input type="text" class="form-control" name="telefono" value="{{ old('telefono',$cliente->telefono) }}">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Añadir</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>