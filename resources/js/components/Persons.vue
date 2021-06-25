<template>
<h1 class="text-xl font-bold mb-4">Create new person</h1>
<div class="mb-4 text-small text-red-700" v-if="errors != '' && successMsg === ''">
    <div>Error!</div>
    <div v-for="error in errors" :key="error">
        <div>{{ error[0] }}</div>
    </div>
</div>
<form id="person" @submit.prevent="handleSubmit">
    <div class="grid grid-cols-1 gap-6">
        <div class="grid grid-rows-1 w-full">
            <label for="source" class="block font-medium text-sm text-gray-700">
                Source
            </label>
            <div class="flex items-center h-12">
                <input type="radio" class="text-gray-900 cursor-pointer mr-2" id="db" name="source" value="db" checked @change="clearMessages">
                <label class="text-gray-700 text-sm cursor-pointer mr-4" for="db">Database</label>

                <input type="radio" class="text-gray-900 cursor-pointer mr-2" id="cache" name="source" value="cache" @change="clearMessages">
                <label class="text-gray-700 text-sm cursor-pointer mr-4" for="cache">Cache</label>

                <input type="radio" class="text-gray-900 cursor-pointer mr-2" id="json" name="source" value="json" @change="clearMessages">
                <label class="text-gray-700 text-sm cursor-pointer mr-4" for="json">JSON</label>

                <input type="radio" class="text-gray-900 cursor-pointer mr-2" id="xlsx" name="source" value="xlsx" @change="clearMessages">
                <label class="text-gray-700 text-sm cursor-pointer mr-4" for="xlsx">Excel</label>
            </div>
        </div>

        <div class="grid grid-rows-1 gap-3 w-full">
            <label for="name" class="block font-medium text-sm text-gray-700">
                Name
            </label>
            <input id="name" type="text" name="name" class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-900" @focus="clearMessages">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="grid grid-rows-1 gap-3 w-full">
                <label for="email" class="block font-medium text-sm text-gray-700">
                    Email
                </label>
                <input id="email" type="text" name="email" class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-900" @focus="clearMessages">
            </div>
            <div class="grid grid-rows-1 gap-3 w-full">
                <label for="phone" class="block font-medium text-sm text-gray-700">
                    Phone
                </label>
                <input id="phone" type="text" name="phone" class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-900" @focus="clearMessages">
            </div>
        </div>
    </div>
    <div class="py-6 flex items-center">
        <button type="submit" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 border
				border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
				hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300
				disabled:opacity-25 transition ease-in-out duration-150" :disabled="disable">
            Create
        </button>
        <div class="ml-4 text-small text-green-700" v-if="successMsg != '' && errors === ''">{{ successMsg }}</div>
    </div>
</form>
</template>

<script>
import {
    ref
} from 'vue';

export default {
    setup(props, {}) {

        const successMsg = ref('');
        const errors = ref('');
        const disable = ref(false);

        function handleSubmit() {
            let form = document.querySelector('#person');
            let data = new FormData(form);
            disable.value = true;
            axios
                .post('/api/persons', data)
                .then((response) => {
                    if (response.data.data === true) {
                        successMsg.value = response.data.message;
                        errors.value = '';
                        let radioInput = document.querySelector('input[name="source"]:checked');
                        form.reset();
                        radioInput.checked = true;
                    } else {
                        errors.value = [
                            ['Saving Error!']
                        ];
                    }
                })
                .catch((error) => {
                    if (error.response)
                        errors.value = error.response.data.errors;
                    successMsg.value = '';
                })
                .finally(() => {
                    disable.value = false;
                });
        }

        function clearMessages() {
            successMsg.value = '';
            errors.value = '';
        }

        return {
            successMsg,
            errors,
            handleSubmit,
            clearMessages,
            disable
        }
    },
};
</script>
