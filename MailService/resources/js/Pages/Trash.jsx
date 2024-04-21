import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Trash({ auth}) {
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Trash" />

           
        </AuthenticatedLayout>
    );
}