export default function useBanks() {

    const banks = [];
    const bank = [];
    const errors = '';


    const getBanks = async () => {
        let response = await axios.get('/api/banks')
        banks.value = response.data.data;
    }

    const getBank = async (id) => {
        let response = await axios.get(`/api/banks/${id}`)
        bank.value = response.data.data;

    }

    const storeBank = async (data) => {
        errors.value = ''
        try {
            await axios.post(`/api/banks`, data)
            await router.push({ name: 'banks.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' '
                }
            }
        }

    }

    const updateBank = async (id) => {
        errors.value = ''
        try {
            await axios.put(`/api/banks/${id}`, employee.value)
            await router.push({ name: 'banks.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' '
                }
            }
        }

    }



    const destroyBank = async (id) => {
        await axios.delete(`/api/employees/${id}`)
    }

    return {
        banks,
        bank,
        errors,
        getBanks,
        getBank,
        storeBank,
        updateBank,
        destroyBank
    }
}