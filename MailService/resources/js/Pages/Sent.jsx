import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Sent({ auth, mails, users }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Sent" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">

                {mails.map((mail, i) => (
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 flex p-6 text-gray-900" key={i}>
                            <div className='w-1/4'>
                                {i + 1}. Title: <a href="http://www.google.hr" > <b>{mail.title}</b> </a>
                            <php> return view(SentDetailed)</php>
                            </div>
                            <div>
                                To:
                                {users.map((user) => {
                                    if (user.id === mail.reciever_id) {
                                        return <b key={user.id}> {user.name}</b>;
                                    } else {
                                        return null;
                                    }
                                })}
                            </div>
                        </div>
                    ))}






                </div>
            </div>


        </AuthenticatedLayout>
    );
}
