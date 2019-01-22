@extends('layouts.app')

@section('content')
    <h1 class="text-center">Cadastro/Finalizando pedido</h1>
    <div class="container">
        <form action="{{route('order_close')}}" method="POST">
            {{csrf_field()}}
            <div class="form-row mb-3">
                <div class="col">
                    <label for="name-ipt">Nome</label>
                    <input type="text" value="{{old('name')}}"
                           class="form-control @if($errors->has('name')) is-invalid @endif" name="name" id="name-ipt"
                           required
                           placeholder="Nome">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">{{$errors->first('name')}}</div>
                    @endif
                </div>
                <div class="col">
                    <label for="cpf-ipt">CPF</label>
                    <input type="text" value="{{old('cpf')}}"
                           class="form-control @if($errors->has('cpf')) is-invalid @endif" name="cpf" id="cpf-ipt"
                           required
                           placeholder="CPF">
                    @if($errors->has('cpf'))
                        <div class="invalid-feedback">{{$errors->first('cpf')}}</div>
                    @endif
                </div>
                <div class="col">
                    <label for="phone-ipt">Telefone</label>
                    <input type="text" value="{{old('phone')}}"
                           class="form-control @if($errors->has('phone')) is-invalid @endif" name="phone" id="phone-ipt"
                           required
                           placeholder="Telefone">
                    @if($errors->has('phone'))
                        <div class="invalid-feedback">{{$errors->first('phone')}}</div>
                    @endif
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col">
                    <label for="email-ipt">Email</label>
                    <input type="email" value="{{old('email')}}"
                           class="form-control @if($errors->has('email')) is-invalid @endif" name="email"
                           id="email-ipt"
                           required
                           placeholder="Email">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">{{$errors->first('email')}}</div>
                    @endif
                </div>
                <div class="col">
                    <label for="zip_code-ipt">CEP</label>
                    <input name="zip_code" value="{{old('zip_code')}}"
                           class="form-control @if($errors->has('zip_code')) is-invalid @endif" type="text"
                           id="zip_code-ipt"
                           placeholder="CEP"
                           pattern="\d{5}-?\d{3}"
                           required
                    />
                    @if($errors->has('zip_code'))
                        <div class="invalid-feedback">{{$errors->first('zip_code')}}</div>
                    @endif
                </div>
                <div class="col">
                    <label for="state-ipt">Estado</label>
                    <select class="custom-select" name="state" id="state-ipt">
                        <option>Selecione o Estado</option>
                        <option value="ac">Acre</option>
                        <option value="al">Alagoas</option>
                        <option value="am">Amazonas</option>
                        <option value="ap">Amapá</option>
                        <option value="ba">Bahia</option>
                        <option value="ce">Ceará</option>
                        <option value="df">Distrito Federal</option>
                        <option value="es">Espírito Santo</option>
                        <option value="go">Goiás</option>
                        <option value="ma">Maranhão</option>
                        <option value="mt">Mato Grosso</option>
                        <option value="ms">Mato Grosso do Sul</option>
                        <option value="mg">Minas Gerais</option>
                        <option value="pa">Pará</option>
                        <option value="pb">Paraíba</option>
                        <option value="pr">Paraná</option>
                        <option value="pe">Pernambuco</option>
                        <option value="pi">Piauí</option>
                        <option value="rj">Rio de Janeiro</option>
                        <option value="rn">Rio Grande do Norte</option>
                        <option value="ro">Rondônia</option>
                        <option value="rs">Rio Grande do Sul</option>
                        <option value="rr">Roraima</option>
                        <option value="sc">Santa Catarina</option>
                        <option value="se">Sergipe</option>
                        <option selected value="sp">São Paulo</option>
                        <option value="to">Tocantins</option>
                    </select>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col">
                    <label for="city-ipt">Cidade</label>
                    <input type="text" value="{{old('city')}}"
                           class="form-control @if($errors->has('city')) is-invalid @endif" name="city" id="city-ipt"
                           required
                           placeholder="Cidade">
                    @if($errors->has('city'))
                        <div class="invalid-feedback">{{$errors->first('city')}}</div>
                    @endif
                </div>
                <div class="col">
                    <label for="district-ipt">Bairro</label>
                    <input type="text" value="{{old('district')}}"
                           class="form-control @if($errors->has('district')) is-invalid @endif" name="district"
                           id="district-ipt"
                           required
                           placeholder="Bairro">
                    @if($errors->has('district'))
                        <div class="invalid-feedback">{{$errors->first('district')}}</div>
                    @endif
                </div>
                <div class="col">
                    <label for="address-ipt">Endereço</label>
                    <input type="text" value="{{old('address')}}"
                           class="form-control @if($errors->has('address')) is-invalid @endif" name="address"
                           id="address-ipt"
                           required
                           placeholder="Endereço">
                    @if($errors->has('address'))
                        <div class="invalid-feedback">{{$errors->first('address')}}</div>
                    @endif
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-success">Concluir Pedido</button>
            </div>
        </form>
        @include('components.cartItemBox')
    </div>
@stop

@push('scripts')
    <script src="https://unpkg.com/imask"></script>
    <script>
        var maskCPF = new IMask(document.getElementById('cpf-ipt'), {mask: '000.000.000-00'});
        var maskPhone = new IMask(document.getElementById('phone-ipt'), {
                mask: [
                    {
                        mask: '(00) 00000-0000',
                        totalLength: 11,
                    },
                    {
                        mask: '(00) 0000-0000',
                        totalLength: 10,
                    },
                    {
                        mask: '00000-0000',
                        totalLength: 9,
                    },
                    {
                        mask: '0000-0000',
                        totalLength: 0,
                    },
                ],
                dispatch: function (appended, dynamicMasked) {
                    var number = (dynamicMasked.value + appended).replace(/\D/g, '');

                    return dynamicMasked.compiledMasks.find(function (m) {
                        return number.length >= m.totalLength;
                    });
                }
            }
        );
        var maskZipCode = new IMask(document.getElementById('zip_code-ipt'), {mask: '00000-000'});
    </script>
@endpush
