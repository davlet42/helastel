<template>
<div class="mb-8">
    <h3 class="font-bold mb-2">API token</h3>
    <button @click="createToken();" type="button" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 border
			border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
			hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300
			disabled:opacity-25 transition ease-in-out duration-150">
        Generate
    </button>
</div>
<div v-if="token != ''" class="text-small text-gray-400">
    {{ token }}
</div>
</template>

<script>
import {
    ref
} from 'vue';

export default {

    setup(props, {}) {

        const token = ref('');

        function createToken() {
            axios.post('/api/create-token')
                .then(response => token.value = response.data.token)
                .catch(error => token.value = error);
        }

        return {
            createToken,
            token
        }
    },
};
</script>
