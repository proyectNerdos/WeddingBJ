<script>
    $(document).ready(function(){
        $("#amount").inputmask('currency', {
            prefix: '$',
            groupSeparator: ',',
            autoGroup: true,
            digits: 2,
            digitsOptional: false,
            placeholder: '0'
        });

        $("#amount_usd").inputmask('currency', {
            prefix: 'USD',
            groupSeparator: ',',
            autoGroup: true,
            digits: 2,
            digitsOptional: false,
            placeholder: '0'
        });

        $("#subtotal_number").inputmask('currency', {
            prefix: '$',
            groupSeparator: ',',
            autoGroup: true,
            digits: 2,
            digitsOptional: false,
            placeholder: '0'
        });

        $("#iva_number").inputmask('currency', {
            prefix: '$',
            groupSeparator: ',',
            autoGroup: true,
            digits: 2,
            digitsOptional: false,
            placeholder: '0'
        });

        $("#percepcion_number").inputmask('currency', {
            prefix: '$',
            groupSeparator: ',',
            autoGroup: true,
            digits: 2,
            digitsOptional: false,
            placeholder: '0'
        });

    });
</script>


