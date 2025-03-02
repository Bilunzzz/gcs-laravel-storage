import { Head, useForm } from '@inertiajs/react';

export default function FileStorage() {
    const { data, setData, post, processing, errors } = useForm({
        file: null,
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route('upload.file'));
    };

    return (
        <>
            <Head title="File Storage" />
            <div className="flex min-h-screen items-center justify-center bg-gray-100">
                <div className="w-full max-w-md rounded-lg bg-white p-8 shadow-md">
                    <h2 className="mb-6 text-center text-2xl font-bold">Upload File to Google Cloud Storage</h2>
                    {errors.file && <div className="mb-4 text-red-500">{errors.file}</div>}
                    <form onSubmit={handleSubmit}>
                        <div className="mb-4">
                            <label className="block text-sm font-medium text-gray-700">File</label>
                            <input
                                type="file"
                                className="mt-1 w-full rounded border p-2"
                                onChange={(e) => setData('file', e.target.files[0])}
                                required
                            />
                        </div>
                        <button type="submit" className="w-full rounded bg-blue-500 py-2 text-white hover:bg-blue-600" disabled={processing}>
                            Upload
                        </button>
                    </form>
                </div>
            </div>
        </>
    );
}
