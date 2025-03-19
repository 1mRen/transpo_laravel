<script setup lang="ts">
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import AppLayout from '@/layouts/AppLayout.vue';

const form = ref({
    user_id: '',
    full_name: '',
    organization_department: '',
    position: '',
    contact_no: '',
    email: '',
});

const submit = () => {
    router.post(route('applicants.store'), form.value, {
        onSuccess: () => {
            alert('Applicant created successfully!');

            // ✅ Clear form fields after submission
            form.value = {
                user_id: '',
                full_name: '',
                organization_department: '',
                position: '',
                contact_no: '',
                email: '',
            };

            // ✅ Redirect to the applicants list page
            router.visit(route('applicants.index'));
        },
        onError: (errors) => {
            console.error('Validation errors:', errors);
            alert('Error submitting form. Please check your input.');
        }
    });
};
</script>

<template>
    <AppLayout>
        <div class="p-6 max-w-lg mx-auto bg-white shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Create Applicant</h2>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                    <input 
                        v-model="form.full_name" 
                        type="text" 
                        class="w-full border border-gray-300 p-3 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter full name" 
                        required 
                    />
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Organization/Department</label>
                    <input 
                        v-model="form.organization_department" 
                        type="text" 
                        class="w-full border border-gray-300 p-3 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter organization or department" 
                        required 
                    />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Position</label>
                    <input 
                        v-model="form.position" 
                        type="text" 
                        class="w-full border border-gray-300 p-3 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter position" 
                        required 
                    />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Contact No</label>
                    <input 
                        v-model="form.contact_no" 
                        type="text" 
                        class="w-full border border-gray-300 p-3 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter contact number" 
                        required 
                    />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input 
                        v-model="form.email" 
                        type="email" 
                        class="w-full border border-gray-300 p-3 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                        placeholder="Enter email address" 
                        required 
                    />
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-600 transition">
                    Create
                </button>
            </form>
        </div>
    </AppLayout>
    
</template>
