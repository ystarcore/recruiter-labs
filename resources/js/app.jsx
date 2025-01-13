import React from "react";
import ReactDOM from "react-dom/client";
import "@ant-design/v5-patch-for-react-19";
import {
    BrowserRouter as Router,
    Routes,
    Route,
    Navigate,
} from "react-router-dom";
import { Provider, useSelector } from "react-redux";
import { ConfigProvider } from "antd";
import { ToastContainer } from "react-toastify";

import { store } from "./app.store";

import Layout from "./layout";
import Login from "./pages/login";
import Home from "./pages/home";
import Apps from "./pages/Apps";
import Business from "./pages/business";
import Community from "./pages/community";
import GoogleAnalytics from "./pages/google";
import KnowledgeBase from "./pages/knowledge";
import Performance from "./pages/performance";
import Staff from "./pages/staff";
import Tickets from "./pages/Tickets";
import FinanceForecast from "./pages/Forecast";
import Profile from "./pages/profile";

import "antd/dist/reset.css";
import "react-toastify/dist/ReactToastify.css";

import "../css/app.css";
import "../css/responsive.css";

const PrivateRoute = ({ children }) => {
    const isAuth = useSelector((state) => state.app.isAuth);
    return isAuth ? children : <Navigate to="/login" />;
};

const App = () => {
    return (
        <Provider store={store}>
            <ConfigProvider>
                <Router>
                    <Routes>
                        <Route path="/login" element={<Login />} />
                        <Route
                            path="*"
                            element={
                                <PrivateRoute>
                                    <Layout>
                                        <Routes>
                                            <Route
                                                path="home"
                                                element={<Home />}
                                            />
                                            <Route
                                                path="business"
                                                element={<Business />}
                                            />
                                            <Route
                                                path="performance"
                                                element={<Performance />}
                                            />
                                            <Route
                                                path="financeforecast"
                                                element={<FinanceForecast />}
                                            />
                                            <Route
                                                path="googleanalytics"
                                                element={<GoogleAnalytics />}
                                            />
                                            <Route
                                                path="staff"
                                                element={<Staff />}
                                            />
                                            <Route
                                                path="tickets"
                                                element={<Tickets />}
                                            />
                                            <Route
                                                path="knowledgebase"
                                                element={<KnowledgeBase />}
                                            />
                                            <Route
                                                path="community"
                                                element={<Community />}
                                            />
                                            <Route
                                                path="apps"
                                                element={<Apps />}
                                            />
                                            <Route
                                                path="profile"
                                                element={<Profile />}
                                            />
                                            {/* Redirect any unknown routes to home */}
                                            <Route
                                                path="*"
                                                element={
                                                    <Navigate to="/home" />
                                                }
                                            />
                                        </Routes>
                                    </Layout>
                                </PrivateRoute>
                            }
                        />
                    </Routes>
                </Router>
                <ToastContainer />
            </ConfigProvider>
        </Provider>
    );
};

ReactDOM.createRoot(document.getElementById("app")).render(<App />);
