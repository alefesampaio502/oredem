$(function () {
    $('.money').mask('#.##0,00', {reverse: true});
    $('.date').mask('00/00/0000');
    $('.money2').mask('#,##0.00', {reverse: true});
    $('.cep').mask('00000-000');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.pis').mask('000.00000.00-0', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.uf').mask('AA');
    $('.selectonfocus').mask("00000000", {selectOnFocus: true});

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
            spOptions = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

    $('.sp_celphones').mask(SPMaskBehavior, spOptions);
})
