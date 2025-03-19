    <script setup lang="ts">
    import { ref } from 'vue';
    import { router } from '@inertiajs/vue3';
    import { route } from 'ziggy-js';
    import AppLayout from '@/layouts/AppLayout.vue';


    const props = defineProps<{ applicant: any }>();

    const form = ref({ ...props.applicant, _method: 'PUT' });

    const update = () => {
    console.log("Applicant ID:", props.applicant.applicant_id); // Debugging
    console.log("Updating with:", form.value); // Debugging

    router.put(route('applicants.update', { applicant: props.applicant.applicant_id }), form.value, {
        onSuccess: () => {
            alert('Applicant updated successfully!');
        },
        onError: (errors) => {
            console.error("Validation Errors:", errors);
            alert('Failed to update applicant.');
        }
    });
};


    </script>

    <template>
        <AppLayout>
            <div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-md">
                <h2 class="text-xl font-bold mb-4">Edit Applicant</h2>

                <form @submit.prevent="update">
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Full Name</label>
                        <input v-model="form.full_name" type="text" class="w-full border p-2 rounded" required />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Organization/Department</label>
                        <input v-model="form.organization_department" type="text" class="w-full border p-2 rounded" required />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Position</label>
                        <input v-model="form.position" type="text" class="w-full border p-2 rounded" required />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Contact No</label>
                        <input v-model="form.contact_no" type="text" class="w-full border p-2 rounded" required />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Email</label>
                        <input v-model="form.email" type="email" class="w-full border p-2 rounded" required />
                    </div>

                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
                </form>
            </div>
        </AppLayout>
    </template>
