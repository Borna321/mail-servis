import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function OpenMail({ auth, mail }) {

    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="OpenMail" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <div className="bg-white overflow-hidden h-72 shadow-sm sm:rounded-lg mt-4  ">
                                <div className="border border-gray-400 rounded p-2 mt-1 ml-2 w-fit"><b>{mail.title}</b></div>

                                <div className="border border-gray-400 rounded p-2 mt-4 ml-2 w-fit"><b>{mail.sender_mail}</b></div>
                                    <hr className="my-2 border-t border-gray-600 w-5/6 mx-auto mt-6"></hr> 

                                <div className=" rounded p-2 mt-8 ml-2 ">{mail.body}</div>
                    </div> 
                </div>
            </div>
        </AuthenticatedLayout>
    );
}