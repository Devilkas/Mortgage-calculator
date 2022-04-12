document.addEventListener('DOMContentLoaded', () => {

    require('./bootstrap');

    if (document.querySelector('#interest_rate')) {
        ionRangeSlider('#interest_rate', {
            min: 0,
            max: 100,
            postfix: "%",
            grid: true,
            grid_num: 5,
            step: .1,
        });
    }

    if (document.querySelector('#min_down_payment')) {
        ionRangeSlider('#min_down_payment', {
            min: 0,
            max: 100,
            postfix: "%",
            grid: true,
            grid_num: 5,
            step: 1,
        });
    }

    if (document.querySelector('#edit_interest_rate')) {
        ionRangeSlider('#edit_interest_rate', {
            min: 0,
            max: 100,
            postfix: "%",
            grid: true,
            grid_num: 5,
            step: .1,
        });
    }

    if (document.querySelector('#edit_min_down_payment')) {
        ionRangeSlider('#edit_min_down_payment', {
            min: 0,
            max: 100,
            postfix: "%",
            grid: true,
            grid_num: 5,
            step: 1,
        });
    }

    let initial_loan_range, down_payment_range;
    let down_payment_min = 0;
    let down_payment_max = 0;
    let down_payment = 0;


    if (document.querySelector('#initial_loan')) {
        initial_loan_range = ionRangeSlider('#initial_loan', {
            min: 0,
            max: 0,
            prefix: "$",
            grid: true,
            grid_num: 10,
            step: 1,
            onStart: function (data) {
                document.querySelector('#initial_loan_input').value = data.from;
            },
            onChange: function (data) {
                document.querySelector('#initial_loan_input').value = data.from;

                if (data.from === 0) {
                    document.querySelector('.btn-get-result').disabled = true;
                }
                if (data.from !== 0) {
                    document.querySelector('.btn-get-result').disabled = false;
                }

                down_payment_max = (Number(data.from) * 0.95).toFixed(0)
                down_payment = Number(data.from) / (100 * down_payment_min);
                down_payment_range.update({ max: down_payment_max, min: down_payment.toFixed(0) });

                document.querySelector('#down_payment_input').setAttribute('max', down_payment_max);
                document.querySelector('#down_payment_input').setAttribute('min', down_payment.toFixed(0));
                document.querySelector('#down_payment_input').value = down_payment.toFixed(0);

            },
        });
    }

    if (document.querySelector('#initial_loan_input')) {
        let max_initial_loan_input = 0;
        document.querySelector('#initial_loan_input').addEventListener("keyup", function (event) {
            document.querySelector('.btn-get-result').disabled = false;
            let val = event.currentTarget.value;
            max_initial_loan_input = document.querySelector('#initial_loan_input').getAttribute('max');

            down_payment = Number(val) / (100 * down_payment_min);

            if (val < 0) {
                val = 0;
                document.querySelector('#initial_loan_input').value = val;
            }
            if (val > Number(max_initial_loan_input)) {
                val = Number(max_initial_loan_input);
                document.querySelector('#initial_loan_input').value = val;
            }

            down_payment_range.update({ max: (Number(val) * 0.95).toFixed(0), min: down_payment.toFixed(0) });

            document.querySelector('#down_payment_input').setAttribute('max', (Number(val) * 0.95).toFixed(0));
            document.querySelector('#down_payment_input').setAttribute('min', down_payment.toFixed(0));
            document.querySelector('#down_payment_input').value = down_payment.toFixed(0);

            initial_loan_range.update({
                from: val
            });

        });
    }
    if (document.querySelector('#down_payment')) {
        down_payment_range = ionRangeSlider('#down_payment', {
            min: 0,
            max: 0,
            prefix: "$",
            grid: true,
            grid_num: 10,
            step: 1,
            onChange: function (data) {
                document.querySelector('#down_payment_input').value = data.from;
            },
            onStart: function (data) {
                document.querySelector('#down_payment_input').value = data.from;
            }
        });
    }
    let max_down_payment_input = 0;
    let min_down_payment_input = 0;
    let timer;

    if (document.querySelector('#down_payment_input')) {
        document.querySelector('#down_payment_input').addEventListener("keyup", function (event) {
            let val = event.currentTarget.value;
            max_down_payment_input = document.querySelector('#down_payment_input').getAttribute('max');
            min_down_payment_input = document.querySelector('#down_payment_input').getAttribute('min');

            clearTimeout(timer);

            timer = setTimeout(() => {
                if (val < Number(min_down_payment_input)) {
                    val = Number(min_down_payment_input);
                    document.querySelector('#down_payment_input').value = val;
                }
            }, 500);

            if (val > Number(max_down_payment_input)) {
                val = Number(max_down_payment_input);
                document.querySelector('#down_payment_input').value = val;
            }

            down_payment_range.update({
                from: val
            });



        });
    }

    let errors = '';


    let getResult = async (id) => {
        let response = await axios.get(`/api/banks/${id}`)

        let n = Number(response.data.data.loan_term)
        let r = Number(response.data.data.interest_rate) / 100; //возможно удрать деление на 100
        let P = Number(document.querySelector('#initial_loan').value) - Number(document.querySelector('#down_payment').value);


        let firstBlock = P * ((r / 12) * Math.pow((1 + r / 12), n));
        let secondBlock = Math.pow((1 + r / 12), n) - 1;
        let block = firstBlock / secondBlock;

        Swal.fire({
            icon: 'success',
            title: 'Monthly mortgage payment',
            text: `$${block.toFixed(2)}`,
        })

    }

    let setRange = async (id) => {
        let response = await axios.get(`/api/banks/${id}`)
        document.querySelector('.btn-get-result').setAttribute('data-id', id);
        let max_initial_loan = response.data.data.max_loan;
        initial_loan_range.update({ max: max_initial_loan });
        down_payment_min = Number(response.data.data.min_down_payment)
        document.querySelector('#initial_loan_input').setAttribute('max', max_initial_loan);
    }



    let updateBank = async (id, data) => {
        errors = ''
        try {
            await axios.put(`/api/banks/${id}`, data)
            document.location.replace('/banks');
        } catch (e) {
            if (e.response.status === 422) {
                for (let key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' '
                }
            }
        }

    }

    let destroyBank = async (id) => {
        await axios.delete(`/api/banks/${id}`)
    }

    let storeBank = async (data) => {
        errors = ''

        try {
            await axios.post(`/api/banks`, data);
            document.location.reload();
        } catch (e) {
            if (e.response.status === 422) {
                for (let key in e.response.data.errors) {
                    errors += e.response.data.errors[key][0] + ' '
                }
            }
        }

    }

    if (document.querySelector('.from-send')) {
        document.querySelector('.from-send').addEventListener('click', () => {
            let formData = new FormData(document.querySelector('#bank-form-send'));
            var object = {};
            formData.forEach(function (value, key) {
                object[key] = value;
            });
            storeBank({ ...object })
        })
    }


    if (document.querySelectorAll('.delete-form')) {
        document.querySelectorAll('.delete-form').forEach(element => {
            element.addEventListener('click', (e) => {
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes!',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        destroyBank(element.dataset.id);
                        document.location.reload();
                    }

                });

            })
        })
    }

    if (document.querySelector('.edit-from-btn')) {
        document.querySelector('.edit-from-btn').addEventListener('click', (event) => {
            event.preventDefault();
            let formData = new FormData(document.querySelector('#edit-form'));
            var object = {};
            formData.forEach(function (value, key) {
                object[key] = value;
            });
            updateBank(event.target.dataset.id, { ...object })
        })
    }

    if (document.querySelector('#select-bank')) {

        new TomSelect("#select-bank");

        document.querySelector('#select-bank').addEventListener('change', (event) => {
            if (event.target.value === 'empty') {
                initial_loan_range.update({ min: 0, max: 0 });
                down_payment_range.update({ min: 0, max: 0 });
                document.querySelector('.btn-get-result').disabled = true;
                return;
            }
            setRange(event.target.value);
        })
    }

    if (document.querySelector('.btn-get-result')) {
        document.querySelector('.btn-get-result').addEventListener('click', (event) => {
            getResult(event.target.dataset.id);
        })
    }


})