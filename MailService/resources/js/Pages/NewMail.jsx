import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import PrimaryButton from "@/Components/PrimaryButton";

export default function NewMail({ auth }) {
    
    
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="New Mail" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 flex justify-center items-center">
                       
                        <div className="bg-gray-400 w-3/4 h-auto p-4 rounded-lg shadow-md m-6 ">
                        <form action="/addmail" method="GET">
                                
                                <div class="mb-4 flex">
                                    <label htmlFor="reciever_mail">To:</label>
                                    <input type="email" id="reciever_mail" name="reciever_mail" required class='ml-24 rounded-lg' placeholder='E-mail'  />
                                    <div class='ml-8'>From: <b>{auth.user.email}</b></div>
                                </div>

                                <div class="mb-4">
                                    <label htmlFor="title">Subject:</label>
                                    <input type="text" id="title" name="title" required class='ml-14 rounded-lg' placeholder='Subject'/>
                                </div>

                                <div class="mb-2">
                                    <label htmlFor="body" class="block">Message:</label>
                                    <textarea id="body" name="body" rows="4" cols="50" required class='ml-28 rounded-lg ' placeholder='Text'></textarea>
                                </div>
                                
                                <div class="mt-16 flex justify-end">
                                    <PrimaryButton type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send mail</PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
