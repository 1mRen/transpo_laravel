<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import { route } from 'ziggy-js';
import AppLayout from '@/layouts/AppLayout.vue';

defineOptions({
  layout: AppLayout,
});

interface Applicant {
    applicant_id: number;
    full_name: string;
    organization_department: string;
    position: string;
    contact_no: string;
    email: string;
    created_at: string;
    updated_at: string;
}

const props = defineProps<{ applicants: Applicant[] }>();

// ✅ Navigate to Create Page
const goToCreatePage = () => {
    router.get(route('applicants.create'));
};

// ✅ Navigate to Edit Page
const goToEditPage = (applicant_id: number) => {
    router.get(route('applicants.edit', applicant_id));
};

// ✅ Delete with Confirmation
const deleteApplicant = (applicant_id: number) => {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('applicants.destroy', applicant_id), {
                onSuccess: () => {
                    Swal.fire('Deleted!', 'The applicant has been removed.', 'success');
                }
            });
        }
    });
};

const formatDate = (dateString: string): string => {
    if (!dateString) return 'N/A';

    const options: Intl.DateTimeFormatOptions = {
        year: 'numeric',
        month: '2-digit',  // Ensures MM format
        day: '2-digit',     // Ensures DD format
        hour: '2-digit',    // 12-hour format
        minute: '2-digit',  // Ensures MM format for minutes
        hour12: true,       // AM/PM format
        timeZone: 'Asia/Manila' // PHP default timezone
    };

    return new Date(dateString).toLocaleString('en-US', options);
};

</script>

<template>
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Applicants List</h1>
            <button 
                @click="goToCreatePage" 
                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition duration-200"
            >
                + Add Applicant
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm">
                        <th class="border p-3">applicant_id</th>
                        <th class="border p-3">Full Name</th>
                        <th class="border p-3">Department</th>
                        <th class="border p-3">Position</th>
                        <th class="border p-3">Contact</th>
                        <th class="border p-3">Email</th>
                        <th class="border p-3">Created At</th>
                        <th class="border p-3">Updated At</th>
                        <th class="border p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr 
                        v-for="applicant in props.applicants" 
                        :key="applicant.applicant_id" 
                        class="text-center hover:bg-gray-50 transition duration-150"
                    >
                    <td class="border p-3 text-gray-900">{{ applicant.applicant_id }}</td>
                    <td class="border p-3 text-gray-900">{{ applicant.full_name }}</td>
                    <td class="border p-3 text-gray-900">{{ applicant.organization_department }}</td>
                    <td class="border p-3 text-gray-900">{{ applicant.position }}</td>
                    <td class="border p-3 text-gray-900">{{ applicant.contact_no }}</td>
                    <td class="border p-3 text-gray-900">{{ applicant.email }}</td>
                    <td class="border p-3 text-gray-900">{{ formatDate(applicant.created_at) }}</td>
                    <td class="border p-3 text-gray-900">{{ formatDate(applicant.updated_at) }}</td>

                        <td class="border p-3 space-x-2">
                            <button 
                                @click="goToEditPage(applicant.applicant_id)"
                                class="px-3 py-1 bg-yellow-500 text-white rounded-md shadow-md hover:bg-yellow-600 transition duration-200"
                            >
                                Edit
                            </button>
                            <button 
                                @click="deleteApplicant(applicant.applicant_id)"
                                class="px-3 py-1 bg-red-600 text-white rounded-md shadow-md hover:bg-red-700 transition duration-200"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr v-if="props.applicants.length === 0">
                        <td colspan="9" class="text-center p-4 text-gray-500">No applicants found.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
