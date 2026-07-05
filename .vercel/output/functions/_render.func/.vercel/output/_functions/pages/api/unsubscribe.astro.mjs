import { createClient } from '@supabase/supabase-js';
export { renderers } from '../../renderers.mjs';

const prerender = false;
const POST = async ({ request }) => {
  try {
    const supabaseUrl = undefined                             || process.env.SUPABASE_URL;
    const supabaseKey = undefined                                     || process.env.SUPABASE_SERVICE_KEY;
    if (!supabaseUrl || !supabaseKey) {
      return new Response(JSON.stringify({ status: "error", message: "Internal Server Error" }), { status: 500 });
    }
    const supabase = createClient(supabaseUrl, supabaseKey);
    const formData = await request.formData();
    const email = formData.get("email")?.toString().trim();
    if (!email || !/^\\S+@\\S+\\.\\S+$/.test(email)) {
      return new Response(JSON.stringify({ status: "error", message: "Invalid email address." }), {
        status: 400,
        headers: { "Content-Type": "application/json" }
      });
    }
    const { data: existing, error: checkError } = await supabase.from("subscribers").select("id, status").eq("email", email).limit(1);
    if (checkError) throw checkError;
    if (!existing || existing.length === 0) {
      return new Response(JSON.stringify({ status: "error", message: "Email not found in our subscriber list." }), {
        status: 404,
        headers: { "Content-Type": "application/json" }
      });
    }
    const currentStatus = existing[0].status;
    if (currentStatus === "unsubscribed") {
      return new Response(JSON.stringify({ status: "success", message: "You are already unsubscribed." }), {
        status: 200,
        headers: { "Content-Type": "application/json" }
      });
    }
    const { error: updateError } = await supabase.from("subscribers").update({ status: "unsubscribed", unsubscribed_at: (/* @__PURE__ */ new Date()).toISOString() }).eq("email", email);
    if (updateError) throw updateError;
    return new Response(JSON.stringify({ status: "success", message: "Successfully unsubscribed from our newsletter." }), {
      status: 200,
      headers: { "Content-Type": "application/json" }
    });
  } catch (error) {
    console.error("API Route Error:", error);
    return new Response(JSON.stringify({ status: "error", message: "Internal Server Error" }), {
      status: 500,
      headers: { "Content-Type": "application/json" }
    });
  }
};

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  POST,
  prerender
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
